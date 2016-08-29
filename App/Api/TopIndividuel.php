<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 22/08/16
 * Time: 01:19
 */

namespace App\Api;


class TopIndividuel extends ApiRequest
{
    function __construct($indice)
    {
        $this->setFile('top_individuel_par_division');
        $this->setParam(['INDICE' => $indice]);
    }


}