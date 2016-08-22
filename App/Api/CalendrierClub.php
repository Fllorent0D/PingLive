<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 22/08/16
 * Time: 01:46
 */

namespace App\Api;


class CalendrierClub extends ApiRequest
{
    function __construct($club)
    {
        $this->setFile('calendrier_par_club');
        $this->setParam(['INDICE' => $club]);
    }
}