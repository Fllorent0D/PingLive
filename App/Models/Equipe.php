<?php

namespace App\Models;


class Equipe extends AppModel
{
    public $joins = [
        'clubs'=>'club',
        'divisions'=>'division',
    ];

    public function getFromClub($indice)
    {
        $all = $this->get(["joins" => ["divisions", "clubs"], "where" => ["clubs.indice" => $indice], "fields" => "equipes.id, equipes.lettre, divisions.nom, divisions.sexe, divisions.serie"]);
        return $all;
    }


}