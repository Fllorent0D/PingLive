<?php

namespace App\Controllers;


use App\Api\CalendrierDivision;
use App\Api\FicheIndividuel;
use App\Api\Journee;
use App\Api\ListeForce;
use App\Api\Resultats;

class DebugController extends AppController
{

    public function index()
    {
        $this->needRender = false;

        $test = new Journee();
        $data = $test->getJourneeActuelle();
        var_dump($data);
    }


}