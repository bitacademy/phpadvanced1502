<?php

/**
 * Description of BaseDB
 *
 * @author dsocol
 */
class BaseDB {

    protected $db;
    protected $numeTabel;
    protected $id;

    public function __construct($db) {


        if ($db == null) {
            throw new Exception("Nu ati setat conexiune la baza de date!");
        }

        $this->db = $db;
    }



    public function getNumeTabel(){
        return $this->numeTabel;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }


    public function save() {
        //daca este setat un ID, se face UPDATE,
        //daca NU se face INSERT
        if($this->getId() == true){
            $this->update();
        }else {
            $this->insert();
        }
    }


    public function update($debug = false) {
        if ($debug == true) {echo "Nume tabel: ".$this->getNumeTabel();}

        if($this->getNumeTabel() == null) throw new Exception('Nume table invalid');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $proprietatiValori = get_class_vars(get_class($this));

        if ($debug == true) {echo "Nume proprietati si valori: ".print_r($proprietatiValori, $returnareCaStringPentruAfisare = true) ;}


        $numarSemneIntrebare = array();

        $proprietatiValori = get_class_vars(get_class($this));

        if ($debug == true) {echo "Nume proprietati si valori: ".print_r($proprietatiValori, $returnareCaStringPentruAfisare = true) ;}


        $numarSemneIntrebare = array();

        //un singur foreach este suficient
        //numeProprietati este de forma "url" => "http://www.youtube.com"
        foreach ($proprietatiValori as $numeProprietate => $valoareProprietateLaInitializareObiect) {
           //excludem ID-ul deoarece la update nu este nevoie de el decat la
            //urma, cand il vom adauga separat
            //excludem si $db si $numeTabel deoarece nu avem nevoie nici de acest parametru
            //in SQL
            //am facut un array temporar ['id', 'db', 'numeTabel'] in care cautam cu
            //NOT in_array($valoarecautata, $array)
            if (! in_array($numeProprietate, array('id', 'db', 'numeTabel')) ) {

                //verificam daca $valoare este null
                //daca da, sarim peste bucla curenta prin continue;

                $getterFunctie = "get".ucfirst($numeProprietate);
                //la UPDATE avem nevoie de o corespondenta intre numele
                //coloanei si semnul de intrebare
                $numeColoana = $this->fromCamelCase($numeProprietate);
                $numarSemneIntrebare[] = $numeColoana . " = ?"; //exemplu: url = ?
                $numeProprietati[] = $numeColoana;
                ///parcurgand in aceeasi ordine acelasi array, va exista
                //corespondenta la indici
                $valoareCurentaProprietate = $this->$getterFunctie();
                if ($debug == true) {
                    echo 'GetterFunctie: '. $getterFunctie.", pentru valoarea: ".
                                        $numeProprietate.", rezultat functie". print_r($valoareCurentaProprietate , 1 ) ;

                }

               $valoareProprietati[] = $valoareCurentaProprietate;

            }
        }

        if ($debug == true) {
            echo "Numar semne intrebare: ".print_r($numarSemneIntrebare, $returnareCaStringPentruAfisare = true) ;
            echo "Valoare proprietati: ".print_r($valoareProprietati, $returnareCaStringPentruAfisare = true) ;
        }





        $stringSemneIntrebarePentruSQl = join(",", $numarSemneIntrebare);
        if($debug == true) echo $stringSemneIntrebarePentruSQl;
        //UPDATE-ul il facem in functie de id, pe care trebuie sa-l adaugam la
        //$valoareProprietati ca fiind ultimul element
        $sql = "UPDATE " . $this->getNumeTabel() .
                 " SET  ". $stringSemneIntrebarePentruSQl .
                    " WHERE id = ? ";

        if ($debug == true) { echo $sql; }

        $q = $this->db->prepare($sql);

        //$valoareProprietati este deja un array, nu mai este nevoie de
        //array($valoareProprietati)

        $valoareProprietati[] = $this->getId();

        $q->execute($valoareProprietati);



    }





   public function insert($debug = false){
        if ($debug == true) {echo "Nume tabel: ".$this->getNumeTabel();}

        if($this->getNumeTabel() == null) throw new Exception('Nume table invalid');

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $proprietatiValori = get_class_vars(get_class($this));

        if ($debug == true) {echo "Nume proprietati si valori: ".print_r($proprietatiValori, $returnareCaStringPentruAfisare = true) ;}


        $numarSemneIntrebare = array();

        //un singur foreach este suficient
        //numeProprietati este de forma "url" => "http://www.youtube.com"
        foreach ($proprietatiValori as $numeProprietate => $valoareProprietateLaInitializareObiect) {
           //excludem ID-ul deoarece la insert nu este nevoie de el
            //excludem si $db si $numeTabel deoarece nu avem nevoie nici de acest parametru
            //in SQL
            //am facut un array temporar ['id', 'db', 'numeTabel'] in care cautam cu
            //NOT in_array($valoarecautata, $array)
            if (! in_array($numeProprietate, array('id', 'db', 'numeTabel')) ) {

                //verificam daca $valoare este null
                //daca da, sarim peste bucla curenta prin continue;

                $getterFunctie = "get".ucfirst($numeProprietate);
                $numarSemneIntrebare[] = "?";
                $numeProprietati[] = $this->fromCamelCase($numeProprietate);
                ///parcurgand in aceeasi ordine acelasi array, va exista
                //corespondenta la indici
                $valoareCurentaProprietate = $this->$getterFunctie();
                if ($debug == true) {
                    echo 'GetterFunctie: '. $getterFunctie.", pentru valoarea: ".
                                        $numeProprietate.", rezultat functie". print_r($valoareCurentaProprietate , 1 ) ;

                }

               $valoareProprietati[] = $valoareCurentaProprietate;

            }
        }


        if ($debug == true) {
            echo "Numar semne intrebare: ".print_r($numarSemneIntrebare, $returnareCaStringPentruAfisare = true) ;
            echo "Valoare proprietati: ".print_r($valoareProprietati, $returnareCaStringPentruAfisare = true) ;
        }





        $stringSemneIntrebarePentruSQl = join(",", $numarSemneIntrebare);

        $sql = "INSERT INTO " . $this->getNumeTabel() . " ( ".join(",",$numeProprietati) . ")"
                . " VALUES (". $stringSemneIntrebarePentruSQl . " ) ";

        if ($debug == true) { echo $sql; }

        $q = $this->db->prepare($sql);

        //$valoareProprietati este deja un array, nu mai este nevoie de
        //array($valoareProprietati)
        $q->execute($valoareProprietati);

    }




    public static function showAll($db, $tableName, $limit = 20){

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM ". $tableName . " ORDER BY id DESC LIMIT " . $limit . ";";
        $q = $db->prepare($sql);
        $q->execute();
        $objectReturnArray = array();

        switch($tableName){
            case 'customers':
                $objectType = 'Customer';
                break;
            case 'video':
                $objectType = 'Video';
                break;
            case 'plati':
                $objectType = 'Plata';
                break;
            case 'pagini':
                $objectType = 'Pagina';
                break;
            case 'pachete':
                $objectType = 'Pachet';
                break;
            default:
                throw new Exception("Invalid table name!");

        }

        while ($data = $q->fetch(PDO::FETCH_ASSOC))
        {

            $object = new $objectType($db);


            foreach ($data as $key => $value) {
                //$key = id_pachet
                //$value = 1

                //$key = data_publicare
                //$value = "2015-03-01 00:00:00"
                $proprietateClasa = self::to_camel_case($key);
                //idPachet = conversie('id_pachet')
                //dataPublicare
                $numeleFunctieiClaseiSet = "set" .   ucfirst($proprietateClasa);

                //setDataPublicare
                $object->$numeleFunctieiClaseiSet($value);
//                $object->setDataPublicare("2015-03-01 00:00:00");



//                $object->idPachet = 1;
//                $object->idpachet = 1;
//                $object->dataPublicare = "2015-03-01 00:00:00";

            }
            $objectReturnArray[$data['id']] = $object;
//            print_r($data);
        }
        return $objectReturnArray;

        }

    /**
     * Translates a camel case string into a string with
     * underscores (e.g. firstName -> first_name)
     *
     * @param string $str String in camel case format
     * @return string $str Translated into underscore format
     */
//print from_camel_case("AstaEcamelCase");
    function from_camel_case($str) {
        $str[0] = strtolower($str[0]);
        $func = create_function('$c', 'return "_" . strtolower($c[1]);');
        return preg_replace_callback('/([A-Z])/', $func, $str);
    }


    /**
     * Translates a string with underscores
     * into camel case (e.g. first_name -> firstName)
     *
     * @param string $str String in underscore format
     * @param bool $capitalise_first_char If true, capitalise the first char in $str
     * @return string $str translated into camel caps
     */
//print to_camel_case("asta_e_cu_underscore", true);

    static function to_camel_case($str, $capitalise_first_char = false) {
        if ($capitalise_first_char) {
            $str[0] = strtoupper($str[0]);
        }
        $func = create_function('$c', 'return strtoupper($c[1]);');
        //print $func;
        return preg_replace_callback('/_([a-z])/', $func, $str);
    }

//    public function afisareProprietati() {
//        $proprietati = get_class_vars($this);
//        return $proprietati;
//
//    }



//adaug aceleasi functii pe care le-a adaugat mister socol , cu mai putin cod in ele
    // transformam un string din underscore format in camelCase format
    function toCamelCase($str) {
       return preg_replace_callback('~_([a-z])~', function ($match) { return strtoupper($match[1]); }, $str);
}
    //transformam un string din camelCase format in underscore format
    function fromCamelCase($str) {
        return preg_replace_callback('~([A-Z])~', function ($match) { return '_' . strtolower($match[1]); }, $str);
    }



}
