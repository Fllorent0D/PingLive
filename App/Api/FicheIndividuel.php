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
}