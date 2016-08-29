<?php

namespace App\Models;


class Club extends AppModel
{
    public function getProvinces()
    {
        return $this->get(["fields" => "distinct(province)", "where" => "province is not null", "order" => "province"]);
    }

}