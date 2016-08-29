<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 22/08/16
 * Time: 01:50
 */

namespace App\Api;


class InfosClub extends ApiRequest
{
    function __construct($club)
    {
        $this->setFile('infosClubs');
        $this->setParam(["INDICE" => $club]);
    }
    public function getInfoClub()
    {
        return $this->request()[0][0];
    }
    public function getInfoPratique()
    {
        return $this->request()[1][0];
    }
    public function getMembres()
    {
        return $this->request()[2];
    }
}