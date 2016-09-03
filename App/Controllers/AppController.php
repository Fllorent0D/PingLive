<?php

namespace App\Controllers;

use Core\Controllers\Controller;

class AppController extends Controller
{
    public $components = ['Auth'];

    public function beforeAction()
    {
        //var_dump($this->Request);
        if (!$this->Auth->isLogged() && $this->Request->controller != "users" && $this->Request->controller != "login")
        {
            $this->Session->setFlash('Vous devez être connecté ou vous n\'avez pas les droits pour effectuer cette action !', 'red');
            $this->redirect('login/');
        }

    }

}