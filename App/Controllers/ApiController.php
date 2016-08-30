<?php

namespace App\Controllers;
use App\Api\CalendrierClub;
use Carbon\Carbon;

class ApiController extends AppController
{
    function __construct($Request, $name, $session)
    {
        parent::__construct($Request, $name, $session);
        header('Content-Type: application/json');
        $this->needRender = false;
    }
    public function infosclub($id)
    {
        $infos = [];
        if(isset($id) && !empty($id))
        {
            $this->loadModel("Club");
            $this->loadModel("Responsable");
            $infos["infos"] = $this->Club->getFirst(["where"=> ["id" => $id]]);
            $infos["membres"] = $this->Responsable->get(["where" => ["club"=>$id]]);
        }
        echo json_encode($infos);
    }
    public function listeclubs($province)
    {
        $liste = [];
        if(isset($province) && !empty($province))
        {
            $this->loadModel("Club");
            $liste = $this->Club->get(["fields" => "id, nom, nom_complet","where"=> ["province" => $province], "order" => "nom"]);
        }
        echo json_encode($liste);
    }
    public function idclubs()
    {
        $this->loadModel("Club");
        $liste = $this->Club->get(["fields" => "indice"]);
        echo json_encode($liste);

    }
    public function rencontreClub($indice)
    {
        $this->loadModel('Equipe');
        $this->loadModel('Club');
        $this->loadModel('Division');
        $this->loadModel('Rencontre');
        $club = $this->Club->getFirst(["where" => ["indice" => $indice]]);

        $test = new CalendrierClub($club->indice);
        $prefix = $test->getClub();

        $rencontres = $test->getCalendrier();
        if($rencontres == "null")
            die;
        foreach ($rencontres as $rencontre)
        {

            if(levenshtein($rencontre->NO1, $prefix) < levenshtein($rencontre->NO2, $prefix))
                $equipe = "NO1";
            else
                $equipe = "NO2";

            $lettre = substr($rencontre->$equipe ,-1);

            $checkEquipe = $this->Equipe->getFirst(["where" => ["club" => $club->id, "lettre" => $lettre]]);
            if($checkEquipe === null)
            {
                // Inscrire une nouvelle équipe
                $newEquipe = new \stdClass();
                $newEquipe->lettre = $lettre;
                $newEquipe->club = $club->id;
                $newEquipe->division = $this->Division->getFirst(["where" => ["nom" => $rencontre->DI]])->id;
                $this->Equipe->create($newEquipe);

                //On refait une requete pour avoir l'id de la nouvelle équipe
                $checkEquipe = $this->Equipe->getFirst(["where" => ["club" => $club->id, "lettre" => $lettre]]);
            }


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
            $newRencontre->division = $checkEquipe->division;


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
        echo json_encode("done");


    }
}