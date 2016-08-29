<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 22/08/16
 * Time: 01:53
 */

namespace App\Api;


class FicheIndividuel extends ApiRequest
{
    function __construct($licence)
    {
        $this->setParam(["LICENCE" => $licence]);
        $this->setFile('fiche_indi');
    }
    public function getInfoJoueur()
    {
        return $this->request()[0];
    }
    public function getVictoires()
    {
        $victoires = $this->request()[2];
        return $this->merge($victoires, "V");
    }
    public function getDefaites()
    {
        $defaites = $this->request()[3];
        return $this->merge($defaites, "D");
    }
    private function merge(array $resultats, $methode)
    {
        $classements = $this->request()[1];
        $return = array();
        for($i = 0; $i < count($classements); $i++)
            $return[$classements[$i]->T] = $resultats[$i]->$methode;

        return $return;
    }
}