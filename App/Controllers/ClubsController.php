<?php

namespace App\Controllers;


class ClubsController extends AppController
{
    public function index()
    {
        $this->loadModel("Province");
        $this->loadModel("Club");

        $d["provinces"] = $this->Province->get();
        foreach ($d["provinces"] as $index => $prov)
        {
            $d["clubs"][$index] = $this->Club->get(["fields" => "id, nom, nom_complet, indice","where"=> ["province" => $prov->id], "order" => "indice"]);
        }
        $this->set($d);
    }
    public function profil($indice)
    {
        $this->loadModel('Club');
        $this->loadModel('Equipe');
        $this->loadModel('Joueur');
        $this->loadModel('Responsable');

        $d["infos"] = $this->Club->getInfos($indice);
        $d["responsables"] = $this->Responsable->getFromClub($indice);
        $d["listM"] = $this->Joueur->getListeForce($indice, "m");
        $d["listF"] = $this->Joueur->getListeForce($indice, "f");
        $d["equipes"] = $this->Equipe->getFromClub($indice);
        //var_dump($d);die;
        /* TODO
            Générer les équipes types de chaque équipe dans $d["equipes"]
        */
        $this->set($d);
    }
}