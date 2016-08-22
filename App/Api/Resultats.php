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
    function __construct($jour, $division)
    {
        $this->setParam(["jour" => $jour, "iddiv" => $division]);
        $this->setFile('results');
    }


}