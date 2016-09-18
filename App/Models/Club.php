<?php

namespace App\Models;


class Club extends AppModel
{
    public $joins = [
        'provinces'=>'province',
    ];

    public function getProvinces()
    {
        return $this->get(["fields" => "distinct(province)", "where" => "province is not null", "order" => "province"]);
    }

    public function getInfos($indice)
    {
        return $this->getFirst(["where"=> ["indice" => $indice], "fields" => "clubs.*, lower(provinces.nom) as province", "joins" => ["provinces"]]);

    }

}