<?php

namespace App\Controllers;


class ClubsController extends AppController
{
    public function index()
    {
        $this->loadModel("Province");
        $d["provinces"] = $this->Province->get();
        $this->set($d);
    }

}