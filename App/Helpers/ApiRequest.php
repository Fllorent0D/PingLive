<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 18/08/16
 * Time: 16:21
 */

namespace App\Helpers;


class ApiRequest
{
    private $url = "http://affrbtt-asbl.be/pda/";
    private $ch;
    private $timeout = 5;

    public $file;

    function __construct($file = null)
    {
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        if(!isset($file))
        {
            $this->file = $file;
        }
    }
    /*
        var n1=response.indexOf("***");
        var n2=response.indexOf("###");
        var n3=response.indexOf("///");
        var n4=response.indexOf("===");
        var n5=response.indexOf("---");
        var n6=response.indexOf("+++");
    */

    public function request()
    {
        return $this->decode($this->fetch());
    }

    private function fetch()
    {
        curl_setopt($this->ch, CURLOPT_URL, $this->url.$this->file);
        $data = curl_exec($this->ch);
        return $data;
    }
    private function decode($data)
    {
        if(($pos = strpos($data, "***")))
        {

        }

    }



}