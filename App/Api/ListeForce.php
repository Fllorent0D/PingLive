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
    function __construct($club)
    {
        $this->setFile('liste_force_messieurs');
        $this->setParam(['INDICE' => $club]);
    }
    public function getIndiceClub()
    {
        if(!isset($this->data))
            $this->request();

        return $this->data[2];

    }
    public function getNomClub()
    {
        if(!isset($this->data))
            $this->request();

        return $this->data[3];

    }
}