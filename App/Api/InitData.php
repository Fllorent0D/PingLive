<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 21/08/16
 * Time: 20:58
 */

namespace App\Api;


class InitData extends ApiRequest
{
    function __construct()
    {
        $this->setFile('init_data');
    }
    public function getClubs()
    {
        if(!isset($this->data))
            $this->request();

        return $this->data[1];
    }
    public function getDivisions()
    {
        if(!isset($this->data))
            $this->request();

        return $this->data[0];

    }

}