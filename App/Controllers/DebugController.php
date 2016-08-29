<?php

namespace App\Controllers;


use App\Api\CalendrierDivision;
use App\Api\FicheIndividuel;
use App\Api\InfosClub;
use App\Api\ListeForce;
use App\Api\Resultats;

class DebugController extends AppController
{

    /**
     *
     */
    public function index()
    {
        $this->needRender = false;

        $test = new InfosClub("L360");
        $data = $test->getInfoClub();
        var_dump($data);
    }


}