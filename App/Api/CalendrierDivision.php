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
    public function getData()
    {
        return $this->request()[0];
    }
}