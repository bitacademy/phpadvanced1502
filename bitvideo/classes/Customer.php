<?php

class Customers extends BaseDB {
    protected $id;
    protected $name;
    protected $dataNastere;
    protected $email;
    protected $mobil;
    protected $adresa;
    protected $dataInscriere;
    protected $dataLogare;
    protected $numeTabel = "customers";





    public function setName($nume) {
        $this->name =$nume;
    }
    public function getName() {
        return $this->name;
    }
    public function setDataNastere($datanastere){
        $this->dataNastere=$datanastere;
    }
    public function getDataNastere(){
        return $this->dataNastere;
    }

    public function setAdresa($adresa) {
        $this->adresa = $adresa;
    }

    public function getAdresa() {
        return $this->adresa;
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
    public function setDataInscriere($DataInscriere){
        $this->dataInscriere=$DataInscriere;
    }
    public function getDataInscriere() {
        return $this->dataInscriere;
    }
    public function setDataLogare($DataLogare){
        $this->dataLogare=$DataLogare;
    }
    public function getDataLogare(){
         return $this->dataLogare;
    }

    public function isLoggedIn() {

    }
    public function hasAccess() {


    }
    public function areAccesLaPachet(Pachet $p){

    }





}

?>
