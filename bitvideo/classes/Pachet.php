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

    //aceasta variabila va exclude orice coloane de tabel pe care dorim sa
    //nu le includem in update() si insert() din BaseDB
    protected $excludeValues = array();


    static public function returneazaPachetDupaIdVideo($db, $idVideo) {

        $sql = 'SELECT `pachete`.*  FROM `pachete`, `video`
                WHERE `pachete`.`id` = `video`.`id_pachet`
                AND `video`.`id` = ?';
        $q = $db->prepare($sql);
        $q->execute(array($idVideo));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $pachet = self::fill($data, 'Pachet', $db);
        return $pachet;
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

