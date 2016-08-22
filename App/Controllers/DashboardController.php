<?php

namespace App\Controllers;


use App\Api\CalendrierClub;
use App\Api\CalendrierDivision;
use App\Api\FeuilleMatch;
use App\Api\Resultats;

class DashboardController extends AppController
{
    public $hasModel = false;


    public function index()
    {
        try{
            $test = new FeuilleMatch("P226261");
            echo var_dump($test->getData());
        }catch (\Exception $ex)
        {
            $this->Session->setFlash($ex->getMessage(), "danger");
        }
    }
    public function test()
    {

    }
}