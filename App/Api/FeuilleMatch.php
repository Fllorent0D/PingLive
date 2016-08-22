<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 21/08/16
 * Time: 21:58
 */

namespace App\Api;


class FeuilleMatch extends ApiRequest
{
    function __construct($idfeuille)
    {
        $this->setFile('feuille_de_matche');
        $this->setParam(["IC" => $idfeuille]);
    }
}