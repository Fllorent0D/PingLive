<?php

namespace App\Controllers;



use App\Api\ListeForce;

class DebugController extends AppController
{

    /**
     *
     */
    public $hasModel = false;
    function __construct($Request, $name, $session)
    {
        parent::__construct($Request, $name, $session);
    }

    public function index()
    {
        return 0;
    }
    public function test()
    {
        $test = new ListeForce("L326");
        var_dump($test->getRawData());
    }


}