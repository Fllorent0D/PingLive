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
    public function getListeMessieurs()
    {
        return $this->request()[0];
    }
    public function getListeDames()
    {
        return $this->request()[1];
    }
    public function getIndice()
    {
        return $this->request()[2];
    }
    public function getClub()
    {
        return $this->request()[3];
    }
}