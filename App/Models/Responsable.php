<?php

namespace App\Models;


class Responsable extends AppModel
{
    public $joins = [
        'clubs'=>'club',
    ];

    public function getFromClub($indice)
    {
        $all =  $this->get(["fields"=> "responsables.*", "where" => ["clubs.indice" => $indice], "joins" => ["clubs"]]);

        foreach($all as $k => $v)
            $all[$k]->fonction = [$v->fonction];

        $merged = array();
        foreach($all as $k => $v)
        {
            $found = false;
            foreach ($merged as $key => $done)
            {
                if($done->email == $v->email)
                {
                    $found = $key;
                }
            }
            if($found != false)
            {
                $merged[$found]->fonction = array_merge($merged[$found]->fonction, $v->fonction);
            }
            else
            {
                array_push($merged, $v);
            }
        }
        return $merged;
    }

}