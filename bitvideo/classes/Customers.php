<?php

class Customers extends BaseDB {
    private $id;
    private $name;
    private $dataNastere;
    private $email;
    private $mobile;
    private $adresa;
    private $dataInscriere;
    private $dataLogare;
    
    //adaugare 3 functii : 1->insert, 2->update, 3->save
    
    public function insert() {
        $db = $this->db;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO customers (name, email, mobile, data_nastere, adresa, data_inscriere, data_logare) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $q = $db->prepare($sql);
        $q->execute(array(
            $this->getName(),
            $this->getEmail(),
            $this->getMobile(),
            $this->getDataNastere(),
            $this->getAdresa(),
            $this->getDataInscriere(),
            $this->getDataLogare()
            ));
    }
    
    
    public function update() {
        $db = $this->db;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE customers SET name = ?, email = ?, mobile = ?, data_nastere = ?, adresa = ?, data_inscriere = ?, data_logare = ? WHERE id = ?";
        $q = $db->prepare($sql);
        $q->execute(array(
            $this->getName(),
            $this->getEmail(),
            $this->getMobile(),
            $this->getDataNastere(),
            $this->getAdresa(),
            $this->getDataInscriere(),
            $this->getDataLogare(),
            $this->getID()
            ));
    }
    
    
    public function save() {
        if($this->getID() != null)
        $this->update();
        else {
        $this->insert();
        }
    }
    
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
    public function setMobile($mobile){
        $this->mobile=$mobile;
    }
    public function getMobile(){
        return $this->mobile;
    }
    public function setDataInscriere($DataInscriere){
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
