<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 21/08/16
 * Time: 21:58
 */

namespace App\Api;


/**
 * Permet de récupérer une feuille de match
 * @package App\Api
 */
class FeuilleMatch extends ApiRequest
{
    /**
     * FeuilleMatch constructor.
     * @param Int id de la feuille
     */
    function __construct($idfeuille)
    {
        $this->setFile('feuille_de_matche');
        $this->setParam(["IC" => $idfeuille]);
    }

    public function getJoueursVisite()
    {
        $this->checkComplete();

        return $this->getJoueurs("JVId", "visite_j");
    }

    public function getJoueursVisiteur()
    {
        $this->checkComplete();

        return $this->getJoueurs("JTId", "visiteur_j");
    }

    /**
     *
     */
    public function isComplete()
    {
        foreach ($this->request()[0] as $joueur)
        {
            if($joueur->JVId != null or $joueur->JTId != null)
            {
                return true;
            }
        }
        return false;
    }
    private function checkComplete()
    {
        if(!$this->isComplete())
            throw new \Exception("La feuille de match n'est pas encodée dans le système");
    }

    private function getJoueurs($key, $index)
    {
        $this->checkComplete();

        $weirdteams = $this->request()[0];

        $players = array();

        for ($i = 0; $i < count($weirdteams); $i++) {
            $players[$index . ($i + 1)] = $weirdteams[$i]->$key;
        }

        return $players;
    }

    public function getIndiceVisite()
    {
        $this->checkComplete();

        return $this->request()[0][0]->IV;
    }

    public function getIndiceVisiteur()
    {
        $this->checkComplete();

        return $this->request()[0][0]->IT;
    }

    public function getMatchs()
    {
        $this->checkComplete();

        $matchs = $this->request()[1];
        $visiteur = $this->getJoueursVisiteur();
        $visite = $this->getJoueursVisite();

        $return = array();
        for ($i = 0; $i < count($matchs); $i++) {
            $newMatch = new \stdClass();
            $newMatch->numero_match = $i + 1;
            $newMatch->numero_visite = $matchs[$i]->NV;
            $newMatch->numero_visiteur = $matchs[$i]->NT;
            //$newMatch->id_visiteur = $visiteur[$matchs[$i]->NT];
            //$newMatch->id_visite = $visite[$matchs[$i]->NV];
            $newMatch->sets_visite = $matchs[$i]->SV;
            $newMatch->sets_visiteur = $matchs[$i]->ST;
            $newMatch->total_visite = $matchs[$i]->TV;
            $newMatch->total_visiteur = $matchs[$i]->TT;

            array_push($return, $newMatch);

        }
        return $return;
    }

    public function getJournee()
    {
        $this->checkComplete();

        return $this->request()[6];

    }
    public function getNumeroFeuilleMatch()
    {
        $this->checkComplete();

        return $this->request()[6];
    }


}