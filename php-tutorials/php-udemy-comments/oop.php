<?php

class ApiParser 
{
    private $data;
    private $url;

    public function __construct($url)
    {
        $this->data = file_get_contents($url);
    }

    private function parser()
    {
         $this->data = json_decode($this->data, true);
    }

    public function getComments()
    {
        return $this->data["results"];
    }
}


?>