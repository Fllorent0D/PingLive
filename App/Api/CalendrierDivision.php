<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 21/08/16
 * Time: 21:23
 */

namespace App\Api;


class CalendrierDivision extends ApiRequest
{

    function __construct($idDivision)
    {
        $this->setParam(["ID_DIV" => $idDivision]);
        $this->setFile("calendrier_par_division");
    }
    public function getCalendrier()
    {
        return $this->request()[0];
    }
    public function getCategorie()
    {
        return $this->request()[1];
    }
    public function getDivision()
    {
        return $this->request()[2];
    }
}