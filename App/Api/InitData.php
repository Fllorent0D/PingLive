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
        return $this->request()[1];
    }
    public function getDivisions()
    {
        return $this->request()[0];
    }

}