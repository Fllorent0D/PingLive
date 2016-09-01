<?php

namespace App\Controllers;



class DebugController extends AppController
{

    /**
     *
     */
    function __construct($Request, $name, $session)
    {
        parent::__construct($Request, $name, $session);
    }

    public function index()
    {
        return 0;
    }


}