<?php

namespace App\Controllers;


use App\Api\CalendrierClub;
use App\Api\CalendrierDivision;
use App\Api\FicheIndividuel;
use App\Api\InfosClub;
use App\Api\ListeForce;
use App\Api\Resultats;
use Carbon\Carbon;
class DebugController extends AppController
{

    /**
     *
     */
    function __construct($Request, $name, $session)
    {
        parent::__construct($Request, $name, $session);

        $this->loadModel('Equipe');
        $this->loadModel('Club');
        $this->loadModel('Division');
        $this->loadModel('Rencontre');
    }

    public function index()
    {
        return 0;
    }
    public function calendar()
    {
        $this->needRender = false;
        ini_set('max_execution_time', 900);
        $clubs = $this->Club->get();
        foreach ($clubs as $key => $club)
        {
            echo $key . " sur ". count($clubs) . " <br />";
            $this->importCalendar($club->indice);
        }
    }
    private function importCalendar($indice)
    {

        $club = $this->Club->getFirst(["where" => ["indice" => $indice]]);

        $test = new CalendrierClub($club->indice);
        $prefix = $test->getClub();

        $rencontres = $test->getCalendrier();
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
        echo "done";
    }


}