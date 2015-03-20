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

    protected $id;
    protected $tipPachet;
    protected $caracteristici;
    protected $sumaPlata;
    protected $numeTabel = "pachete";


     public function returneazaPachetDupaIdVideo($idVideo) {

        $db = $this->db;
        $sql = 'SELECT id FROM `video` WHERE `id_pachet` = ?';
        $q = $db->prepare($sql);
        $q->execute(array($idVideo));
        $data = $q->fetch(PDO::FETCH_ASSOC);

        return $data;
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


}

