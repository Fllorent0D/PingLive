<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 18/08/16
 * Time: 16:21
 */

namespace App\Api;


abstract class ApiRequest
{
    private $baseurl = "http://affrbtt-asbl.be/pda/";
    private $ch;
    private $timeout = 5;
    private $file;
    private $separators = ['!!!','***', '$$$', '###','&&&','+++','---', '>>>','///', '===', '<<<' ];
    private $params = [];
    private $url;
    private $debug = false;

    public function getData()
    {
        return $this->request();
    }

    protected function setFile($file)
    {
        $this->file = $file . ".php";
    }
    protected function setParam(array $param)
    {
        $this->params = array_merge($this->params, $param);
    }

    protected function request()
    {
        if(!isset($this->file))
            throw new \Exception('Aucune information sur le fichier à récupérer');

        return $this->decode($this->fetch());
    }
    private function generateUrl()
    {
        $this->url = $this->baseurl.$this->file."?".http_build_query($this->params);
    }

    private function fetch()
    {
        $this->ch = curl_init();
        $this->generateUrl();
        var_dump($this->url);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        curl_setopt($this->ch, CURLOPT_URL, $this->url);

        $data = curl_exec($this->ch);
        curl_close($this->ch);

        return $data;
    }
    private function decode($data)
    {
        $decoded = array();
        $splited = preg_split('/\!\!\!|\*\*\*|\$\$\$|\#\#\#|\&\&\&|\+\+\+|\-\-\-|\>\>\>|\/\/\/|\=\=\=|\<\<\</', $data);
        foreach($splited as $key => $item)
        {
            $response = json_decode($item);
            if ($response === null)
                $response = $item;
            array_push($decoded, $response);
        }
        return $decoded;
    }



}