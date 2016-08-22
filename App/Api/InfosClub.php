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
}