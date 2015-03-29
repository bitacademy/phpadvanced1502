<?php

class Customer extends BaseDB {
    protected $id;
    protected $name;
    protected $dataNastere;
    protected $email;
    protected $mobil;
    protected $adresa;
    protected $dataInscriere;
    protected $dataLogare;
    protected $numeTabel = "customers";

    //aceasta variabila va exclude orice coloane de tabel pe care dorim sa
    //nu le includem in update() si insert() din BaseDB
    protected $excludeValues = array('username', 'password', 'mobile');

    static protected $savedInstance;



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

    /*
     * Functia verifica daca este setata variabila de sesiune pe server
     * si returneaza valoarea acesteia daca da si false daca nu
     * */
    static public function isLoggedIn() {
       if(isset($_SESSION['ESTE_LOGAT'])) {
            return $_SESSION['ESTE_LOGAT'];
        }
        else return false;
    }

    public function doLogin($username, $password){

        $sql = 'SELECT *  FROM `customers` WHERE (`email` = ? AND password = ?)
                OR (`username` = ? AND password = ?) ';
        $q = $this->db->prepare($sql);
        $hashedPassword = md5($password);
        $q->execute(array($username, $hashedPassword, $username, $hashedPassword));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        if ($data != null) {
            foreach ($data as $coloanaTabel => $valoare){
                $proprietateClasa = self::to_camel_case($coloanaTabel);
                //idPachet = conversie('id_pachet')
                //dataPublicare
                $numeleFunctieiClaseiSet = "set" .   ucfirst($proprietateClasa);

                $arrayExcludeKeys = array_merge($this->excludeValues, array( 'db','numeTabel'));
                if ( in_array($coloanaTabel, $arrayExcludeKeys) ) {
                    //se sare peste coloanele nedorite
                    continue;
                }

                //setDataPublicare
                $this->$numeleFunctieiClaseiSet($valoare);

                $arrayCustomer[$proprietateClasa] = $valoare;
            }

            $_SESSION['ESTE_LOGAT'] = json_encode($arrayCustomer) ;
            return true;
        }
        else return false;


    }

    public function hasAccess($idPagina, $tipPagina) {

        if ($tipPagina == 'video'){
            $pachet = Pachet::returneazaPachetDupaIdVideo($this->db, $idPagina);
            if ($this->areAccesLaPachet($pachet)){
                return true;
            }
            else return false;
        }
        else if ($tipPagina == 'pagina'){
            //daca vizualizeaza pagini i se permite accesul
            return true;
        }
        else throw new Exception('$tipPagina invalida!');

    }
    public function areAccesLaPachet(Pachet $p){
        $plata = new Plata($this->db);
        $idPachet = $p->getId();
        //$this in acest context este Customer
        $validarePlata = $plata->dacaUltimaPlataEsteValida($this, $idPachet);

        if ($validarePlata) return true;
        else return false;
    }





}

?>
