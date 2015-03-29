<?php

class Pagina extends BaseDB{
    protected $id;
    protected $titlu;
    protected $url;
    protected $continut;
    protected $estePublicata;
    protected $dataPublicare;
    protected $numeTabel = "pagini";
    //aceasta variabila va exclude orice coloane de tabel pe care dorim sa
    //nu le includem in update() si insert() din BaseDB
    protected $excludeValues = array();



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

    static public function getPaginaCurenta(){
        //echo "<PRE>";
        //print_r($_SERVER);
        //echo "</PRE>";
        $requestFileName = basename($_SERVER['SCRIPT_NAME']);

        switch($requestFileName){
            case 'index.php':
            case 'pagini.php':
                $arrayPagina['id'] = null;
                $arrayPagina['tip_pagina'] = 'pagina';
                break;
            case 'videos.php':
                $queryString = $_SERVER['QUERY_STRING'];
                parse_str($queryString);
                // id=245&categorie=24 => $id = 245; $categorie = 24;
                $arrayPagina['id'] = $id;
                $arrayPagina['tip_pagina'] = 'video';
                break;
        }
    }
    static public function redirecteaza($mesaj){
        $urlMesaj = urlencode($mesaj);
        header("Location: error.php?message=".$urlMesaj);
        exit();
    }
}
