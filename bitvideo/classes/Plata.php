<?php

class Plata extends BaseDB{
    protected $id;
    protected $idClient;
    protected $pachete;
    protected $dataPlata;
    protected $suma;
    protected $numeTabel = "plati";
    //aceasta variabila va exclude orice coloane de tabel pe care dorim sa
        //nu le includem in update() si insert() din BaseDB
    protected $excludeValues = array();

    public function setIdClient($idClient){
        $this->idClient = $idClient;
    }

    public function getIdClient(){
        return $this->idClient;
    }
    public function setPachete($pachete){
        $this->pachete = $pachete;
    }

    public function getPachete(){
        return $this->pachete;
    }
    public function setSuma($suma){
        $this->suma = $suma;
    }

    public function getSuma(){
        return $this->suma;
    }
     public function setDataPlata($dataPlata){
        $this->dataPlata = $dataPlata;
    }

    public function getDataPlata(){
        return $this->dataPlata;
    }
    /*
     * Functia returneaza un array cu rezultatele platilor
     * clientului $c
     * */
    public function istoricPlati(Customer $c, $limit = 100){
        $sql = 'SELECT * FROM `plati` WHERE `id_client` = ? ORDER BY id DESC LIMIT ? ';
        $q = $this->db->prepare($sql);
        $idClient = $c->getId();
        $q->execute(array($idClient, $limit));
        $resultsArray = null;
        while ( $data = $q->fetch(PDO::FETCH_ASSOC)) {
            $resultsArray[] = $data;
        }

        return $resultsArray;

    }
    public function dacaUltimaPlataEsteValida(Customer $c, $idPachet = null){
        $ultimaPlataRezultate = $this->istoricPlati($c, $limitareLa = 1);

        //in cazul unui singur rezultat se va returna un array de array
        //avand un singur element array[0] => $data
        $ultimaPlata = $ultimaPlataRezultate[0];

        $dataPlata = $ultimaPlata['data_plata'];
        if ($dataPlata == null) return false;
        $dateTimeDataPlata = DateTime::createFromFormat('Y-m-d H:i:s', $dataPlata);
        $dateTimeAcum = new DateTime();

        $intervalDiferenta = $dateTimeAcum->diff($dateTimeDataPlata);

        $zileDiferenta = $intervalDiferenta->format('%R%a');
        if (is_numeric($idPachet)){


            $pacheteString = $ultimaPlata['pachete'];
            $pacheteArray = explode($pachete);
            if (count($pacheteArray) > 1) {
                if (in_array($idPachet, $pacheteArray)){
                    $pachetulEstePlatit = true;

                }
                else $pachetulEstePlatit = false;
            }
            else {
                if ($idPachet == $pacheteString ){
                    $pachetulEstePlatit = true;
                }
                else $pachetulEstePlatit = false;
            }
        }
        else {
            //daca parametrul idPachet nu a fost furnizat
            //inseamna ca se doreste validarea doar a datei platii
            //nu si a abonamentului si atunci il setam ca fiind true
            $pachetulEstePlatit = true;
        }
        if ($zileDiferenta > 30){
            //daca s-a depasit plata anterioara cu 30 de zile inseamna ca a
            //expirat abonamentul lunar si ca nu l-a platit
            $aExpiratAbonamentul = true;
        }
        else $aExpiratAbonamentul = false;


        if (( $aExpiratAbonamentul !== false) && ($pachetulEstePlatit === true)) return true;
        else return false;

    }
}
