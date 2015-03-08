<?php

class Pagina extends BaseDB{
    private $id;
    private $tipPagina;
    private $titlu;
    private $url;
    private $continut;
    private $estePublicata;
    private $dataPublicare;
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getId(){
        return $this->id; 
    }
    
    public function setTipPagina($tipPagina){
        $this->tipPagina = $tipPagina;
    }
    
    public function getTipPagina(){
        return $this->tip_pagina;
    }
    
    public function setTitlu($titlu){
        $this-> titlu = $titlu;
    }
    
    public function getTitlu(){
        return $this-> titlu;
    }
    public function setUrl($url){
        $this-> url = $url;
    }
    
    public function getUrl(){
        return $this-> url;
    }
    public function setContinut($continut){
        $this-> continut = $continut;
    }
    
    public function getContinut(){
        return $this-> continut;
    }
    public function setEstePublicata($estePublicata){
        $this-> estePublicata = $estePublicata;
    }
    
    public function getEstePublicata(){
        return $this-> estePublicata;
    }
     public function setDataPublicare($dataPublicare){
        $this-> dataPublicare = $dataPublicare;
    }
    
    public function getDataPublicare(){
        return $this-> dataPublicare;
    }
    public function insert(){
        $pdo = $this->db;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO pagini (titlu, url, continut, este) values(?, ?, ?, ?, ?)";
	$q = $pdo->prepare($sql);
	$q->execute(array(
                
            $this->getTitlu(),
            $this->getUrl(),
            
                ));
	
    }
    public function update(){                   //update.php
        
        
        $pdo = $this->db;
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE pagini  set titlu = ?, ...., data_publicare = ? WHERE id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array(
                        
                    $this->getTitlu(),
                    ......
                    $this->getId()
                    
                        ));
        
    }
    public function save(){                     //logica de pe tabla cu inlocuirea pdo-ului cu $this->db  
        if ($this->getId()) {
            
            $this->update();
        }
        else{
            $this->insert();
        }
    }
}