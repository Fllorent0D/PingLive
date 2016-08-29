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
    public function getCalendrier()
    {
        return $this->request()[0];
    }
    public function getClub()
    {
        return $this->request()[2];
    }
    public function getIndice()
    {
        return $this->request()[1];
    }
}