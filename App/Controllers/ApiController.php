<?php

namespace App\Controllers;


class ApiController extends AppController
{
    function __construct($Request, $name, $session)
    {
        parent::__construct($Request, $name, $session);
        header('Content-Type: application/json');
        $this->needRender = false;
    }
    public function infosclub($id)
    {
        $infos = [];
        if(isset($id) && !empty($id))
        {
            $this->loadModel("Club");
            $this->loadModel("Responsable");
            $infos["infos"] = $this->Club->getFirst(["where"=> ["id" => $id]]);
            $infos["membres"] = $this->Responsable->get(["where" => ["club"=>$id]]);
        }
        echo json_encode($infos);
    }
    public function listeclubs($province)
    {
        $liste = [];
        if(isset($province) && !empty($province))
        {
            $this->loadModel("Club");
            $liste = $this->Club->get(["fields" => "id, nom, nom_complet","where"=> ["province" => $province], "order" => "nom"]);
        }
        echo json_encode($liste);
    }
}