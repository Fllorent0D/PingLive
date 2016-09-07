<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 31/08/16
 * Time: 17:10
 */

namespace App\Controllers;


class CalendrierController extends AppController
{
    public $hasModel = false;
    public function index()
    {

    }
    public function club($indice)
    {
        $this->loadModel('Rencontre');
        $this->loadModel('Equipe');

        $d["equipes"] = $this->Equipe->getFromClub($indice);
        foreach ($d["equipes"] as $key => $equipe)
        {
            $d["rencontres"][$key] = $this->Rencontre->getRencontresEquipe($equipe->id);
        }

        $this->set($d);
    }
}