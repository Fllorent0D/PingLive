<?php

namespace App\Controllers;
use App\Api\CalendrierClub;
use App\Api\ListeForce;
use Carbon\Carbon;

class ApiController extends AppController
{
    private $data = null;
    private $status = "success";

    //Methode pour gérer le JSend
    public function beforeAction()
    {
        $this->loadModel("Club");
        $this->loadModel("Responsable");
        $this->loadModel('Equipe');
        $this->loadModel('Division');
        $this->loadModel('Categorie');
        $this->loadModel('Rencontre');
        $this->loadModel('Joueur');
    }
    public function beforeRender()
    {
        header('Content-Type: application/json');
        $this->needRender = false;

        if($this->status == "error")
            $key = "message";
        else
            $key = "data";
        $response = ["status" => $this->status, $key => $this->data];

        echo json_encode($response);
    }
    private function setData($data)
    {
        $this->data = $data;
    }
    private function setStatus($status)
    {
        $this->status = $status;
    }


    public function infosclub($id)
    {
        $infos = [];
        if(isset($id) && !empty($id))
        {
            $infos["infos"] = $this->Club->getFirst(["where"=> ["id" => $id]]);
            //$infos["membres"] = $this->Responsable->get(["where" => ["club"=>$id]]);
            $this->setData($infos);

        }
        else
        {
            $this->status = "fail";
            $this->setData(["id"=>"ce parametre est requis"]);

        }
    }
    public function listeclubs($province)
    {
        $liste = [];
        if(isset($province) && !empty($province))
        {
            $this->loadModel("Club");
            $liste = $this->Club->get(["fields" => "id, nom, nom_complet","where"=> ["province" => $province], "order" => "nom"]);
            $this->setData($liste);

        }
        else
        {
            $this->setStatus("fail");
            $this->setData(["province"=>"ce parametre est requis"]);
        }
    }
    public function idclubs()
    {
        $liste = $this->Club->get(["fields" => "indice"]);
        $this->setData($liste);

    }
    public function categories()
    {

        $categorie = $this->Categorie->get(["fields" => "id, nom"]);
        $this->setData($categorie);
    }
    public function divisions($id)
    {
        $categorie = $this->Division->get(["fields" => "distinct(nom)", "where" => ["categorie" => $id]]);
        $this->setData($categorie);
    }
    public function series($categorie, $nom)
    {
        $categorie = $this->Division->get(["fields" => "serie, id", "where" => ["categorie"=> $categorie, "nom" => $nom]]);
        $this->setData($categorie);
    }
    public function journees($serie)
    {
        $categorie = $this->Rencontre->get(["fields" => "distinct(journee)", "where" => ["division"=> $serie]]);
        $this->setData($categorie);
    }
    public function rencontre($division, $journee)
    {


        $response = $this->Rencontre->getRencontres($division, $journee);

        $this->setData($response);
    }



    public function importJoueurs($indice)
    {

        try {
            $club = $this->Club->getFirst(["where" => ["indice" => $indice]]);

            $test = new ListeForce($club->indice);
            $hommes = $test->getListeMessieurs();
            $femmes = $test->getListeDames();
            foreach ($hommes as $i => $homme) {
                $hommes[$i]->sexe = "M";
            }
            foreach ($femmes as $i => $femme) {
                $femmes[$i]->sexe = "F";
            }

            $listeforce = array_merge($femmes, $hommes);
            foreach ($listeforce as  $joueur)
            {
                $newjoueur = new \stdClass();
                $newjoueur->licence = $joueur->IDENTIFICATION;
                $newjoueur->nom = $joueur->NOM;
                $newjoueur->classement = $joueur->CH;
                $newjoueur->sexe = $joueur->sexe;
                $newjoueur->club = $club->id;
                $newjoueur->nu1 = $joueur->NU;
                $newjoueur->nu2 = $joueur->ID;

                $checkjoueur = $this->Joueur->getFirst(["where" => ["licence" => $joueur->IDENTIFICATION, "sexe" => $newjoueur->sexe]]);

                if(empty($checkjoueur))
                {
                    $this->Joueur->create($newjoueur);
                }
                else
                {
                    $this->Joueur->update($checkjoueur->id, $newjoueur);
                }
            }
        }
        catch (\Exception $ex)
        {
            $this->setData($indice." : ".$ex->getMessage());
            $this->setStatus("error");
        }
    }
    /**
     * Importer les rencontres d'une club
     * @param $indice
     */
    public function importRencontreClub($indice)
    {
        try
        {
            $club = $this->Club->getFirst(["where" => ["indice" => $indice]]);

            $test = new CalendrierClub($club->indice);
            $prefix = $test->getClub();

            $rencontres = $test->getCalendrier();

            if($rencontres == "null")
            {
                throw new \Exception("Aucune rencontre récupérée");
            }

            foreach ($rencontres as $rencontre)
            {
                //On compare la différence entre les deux équipes pour savoir laquelle est celle qui nous interesse est visite ou visiteur
                if(levenshtein($rencontre->NO1, $prefix) < levenshtein($rencontre->NO2, $prefix))
                    $equipe = "NO1";
                else
                    $equipe = "NO2";

                //Récupère la lettre dans le nom
                $lettre = substr($rencontre->$equipe ,-1);

                //On regarde si l'équipe avec cette lettre existe
                $checkEquipe = $this->Equipe->getFirst(["where" => ["club" => $club->id, "lettre" => $lettre]]);
                if($checkEquipe === null)
                {
                    // Inscrire une nouvelle équipe
                    $newEquipe = new \stdClass();
                    $newEquipe->lettre = $lettre;
                    $newEquipe->club = $club->id;
                    //$newEquipe->division = $checkEquipe->division;
                    $this->Equipe->create($newEquipe);

                    //On refait une requete pour avoir l'id de la nouvelle équipe
                    $checkEquipe = $this->Equipe->getFirst(["where" => ["club" => $club->id, "lettre" => $lettre]]);
                }

                //On crée un objet contenant la rencontre
                $newRencontre = new \stdClass();
                $newRencontre->journee = $rencontre->JO;
                if($equipe == "NO1")
                    $newRencontre->visite = $checkEquipe->id;
                else
                    $newRencontre->visiteur = $checkEquipe->id;

                $newRencontre->feuille_match = $rencontre->ID;

                if(!empty($rencontre->HE1))
                {
                    $rencontre->HE1 = strtoupper($rencontre->HE1);
                    $date = Carbon::createFromFormat('d/m/Y H\Hi', $rencontre->DAT . " ".$rencontre->HE1);
                }
                else
                    $date = Carbon::createFromFormat('d/m/Y', $rencontre->DAT);

                $newRencontre->date_match = $date->format("Y-m-d H:i:s");
                //$newRencontre->division = $checkEquipe->division;


                $checkRencontre = $this->Rencontre->getFirst(["where" => ["feuille_match" => $rencontre->ID]]);
                if($checkRencontre === null)
                {
                    // Inscrire une nouvelle rencontre
                    $this->Rencontre->create($newRencontre);
                }
                else
                {
                    $this->Rencontre->update($checkRencontre->id, $newRencontre);
                }
            }
        }
        catch (\Exception $ex)
        {
            $this->setData($indice." : ".$ex->getMessage());
            $this->setStatus("error");
        }



    }
}