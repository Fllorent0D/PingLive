<?php

namespace App\Controllers;


use App\Api\Resultats;

class DashboardController extends AppController
{

    # Pas besoin de model pour cette page de démonstration
    public $hasModel = false;

    /**
     * Fonction d'accueil
     */
    public function index()
    {
        $this->needRender = false;
        $test = new Resultats(1, 1001);
        echo var_dump($test->getData());
    }
    public function test()
    {

    }
}