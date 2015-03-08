<?php

class Customers extends BaseDB {
    private $id;
    private $name;
    private $dataNastere;
    private $email;
    private $mobil;
    private $adresa;
    private $dataInscriere;
    private $dataLogare;
    
    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function setName($nume) {
        $this->name =$nume;        
    }
    public function getName() {
        return $this->name;
    }
    public function setDataNastere($datanastere){
        $this->datanastere=$dataNastere;
    }
    public function getDataNastere(){
        return $this->datanastere;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setMobil($mobil){
        $this->mobil=$mobil;
    }
    public function getMobil(){
        return $this->mobil;
    }
    public function setDataInsciere($DataInscriere){
        $this->dataInscriere=$DataInscriere;
    }
    public function getDataInscriere() {
        return $this->DdataInscriere;
    }
    public function setDataLogare($DataLogare){
        $this->dataLogare=$dataLogare;
    }    
    public function getDataLogare(){
         return $this->DataLogare;       
    }
    
    public function isLoggedIn() {
        
    }
    public function hasAccess() {
        
        
    }
    public function areAccesLaPachet(Pachet $p){
        
    }
    
    
    
    
  
}

?>
