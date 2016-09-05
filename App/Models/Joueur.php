<?php

namespace App\Models;


class Joueur extends AppModel
{
    public $joins = [
    'clubs'=>'club',

    ];
    public function getListeForce($indice, $sexe)
    {
        $all = $this->get(["where" => ["clubs.indice" => $indice, "sexe" => strtoupper($sexe)], "fields"=> "joueurs.*", "joins" => ["clubs"], "order" => "joueurs.nu2+0, joueurs.nu1+0"]);
        return $all;
    }



}