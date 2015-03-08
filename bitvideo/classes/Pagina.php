<?php

class Pagina{
    private $id;
    private $tip_pagina;
    private $titlu;
    private $url;
    private $continut;
    private $este_publicata;
    private $data_publicare;
    
    public function setId(){
        $this-> id = $id;
    }
    
    public function getId(){
        return $this->$id;
    }
    
    public function setTipPagina(){
        $this-> tip_pagina = $tip_pagina;
    }
    
    public function getTipPagina(){
        return $this-> $tip_pagina;
    }
    
    public function setTitlu(){
        $this-> titlu = $titlu;
    }
    
    public function getTitlu(){
        return $this-> $titlu;
    }
    public function setUrl(){
        $this-> url = $url;
    }
    
    public function getUrl(){
        return $this-> $url;
    }
    public function setContinut(){
        $this-> continut = $continut;
    }
    
    public function getContinut(){
        return $this-> $url;
    }
    
}