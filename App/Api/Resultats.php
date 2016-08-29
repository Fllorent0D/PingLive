<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 21/08/16
 * Time: 21:45
 */

namespace App\Api;


class Resultats extends ApiRequest
{
    /**
     * Resultats d'une journée d'une division.
     * @param Jour
     * @param Division
     */
    function __construct($jour, $division)
    {
        $this->setParam(["jour" => $jour, "iddiv" => $division]);
        $this->setFile('results');
    }
    public function getResultats()
    {
        return $this->request()[0];
    }
    public function getCategorie()
    {
        return $this->request()[2];
    }
    public function getDivision()
    {
        return $this->request()[3];
    }
    public function getDescriptionJournee(){
        return $this->request()[4];
    }

}