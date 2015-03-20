<?php

class Pagina extends BaseDB{
    protected $id;
    protected $titlu;
    protected $url;
    protected $continut;
    protected $estePublicata;
    protected $dataPublicare;
    protected $numeTabel = "pagini";


    public function setTitlu($titlu){
        $this->titlu = $titlu;
    }

    public function getTitlu(){
        return $this->titlu;
    }
    public function setUrl($url){
        $this->url = $url;
    }

    public function getUrl(){
        return $this->url;
    }
    public function setContinut($continut){
        $this->continut = $continut;
    }

    public function getContinut(){
        return $this->continut;
    }
    public function setEstePublicata($estePublicata){
        $this->estePublicata = $estePublicata;
    }

    public function getEstePublicata(){
        return $this->estePublicata;
    }
     public function setDataPublicare($dataPublicare){
        $this->dataPublicare = $dataPublicare;
    }

    public function getDataPublicare(){
        return $this->dataPublicare;
    }
}
