<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 22/08/16
 * Time: 01:26
 */

namespace App\Api;


class ListeForce extends ApiRequest
{
    function __construct($club = "")
    {
        $this->setFile('liste_force_messieurs');
        $this->setParam(['INDICE' => $club]);
    }
    public function getIndiceClub()
    {
        return $this->request()[2];

    }
    public function getNomClub()
    {
        return $this->request()[3];

    }
}