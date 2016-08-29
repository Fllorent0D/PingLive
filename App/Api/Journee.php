<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 21/08/16
 * Time: 20:39
 */

namespace App\Api;


class Journee extends ApiRequest
{

    public function __construct()
    {
        $this->setFile('journee');
    }
    public function getJourneeActuelle()
    {
        return $this->request()[0];
    }

}