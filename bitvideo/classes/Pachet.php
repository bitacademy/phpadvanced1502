<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pachet
 *
 * @author dsocol
 */
class Pachet extends BaseDB {

    private $id;
    protected $tipPachet;
    protected $caracteristici;
    protected $sumaPlata;
    private $tipPachet;
    private $caracteristici;
    private $sumaPlata;
    protected $numeTabel = "pachete";
    
    public function getNumeTabel(){
        return $this->numeTabel;
    }

    
     public function returneazaPachetDupaIdVideo($idVideo) {

        $db = Database::connect();
        $sql = 'SELECT id FROM `video` WHERE `id_pachet` = ?';
        $q = $db->prepare($sql);
        $q->execute(array($idVideo));
        $data = $q->fetch(PDO::FETCH_ASSOC);

        Database::disconnect();
        return $data;
    }

    public function save() {
        if ($this->getId())
            $this->update();
        else
            $this->insert();
    }

    public function insert() {
        $db = $this->db;
        //$db = Database::connect();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO pachete (caracteristici,suma_plata,tip_pachet) values(?, ?, ?)";
        $q = $db->prepare($sql);
        $q->execute(array(
            $this->getCaracteristici(),
            $this->getSumaPlata(),
            $this->getTipPachet()
        ));
        //Database::disconnect();
    }

    public function update() {

        $db = Database::connect();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE pachet  set caracteristici = ?, WHERE id = ?";
        $q = $db->prepare($sql);
        $q->execute(array(
            $this->getCaracteristici(),
            $this->getSumaPlata(),
            $this->getTipPachet(),
            $this->getId()
        ));
        Database::disconnect();
    }

    public function getTipPachet() {
        return $this->tipPachet;
    }

    public function getCaracteristici() {
        return $this->caracteristici;
    }

    public function getSumaPlata() {
        return $this->sumaPlata;
    }

    public function setTipPachet($tipPachet) {
        $this->tipPachet = $tipPachet;
    }

    public function setCaracteristici($caracteristici) {
        $this->caracteristici = $caracteristici;
    }

    public function setSumaPlata($sumaPlata) {
        $this->sumaPlata = $sumaPlata;
    }
    
    
      function GetClassVars()
    {
        return array_keys(get_class_vars(get_class($this))); // $this
    }

      function afisareProprietati() {
       return get_class_vars(get_class($this));
        //  return get_class_vars($this);
    }
}

