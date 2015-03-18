<?php

/**
 * Description of BaseDB
 *
 * @author dsocol
 */
class BaseDB {

    protected $db;
    protected $numeTabel;

    public function __construct($db) {


        if ($db == null) {
            throw new Exception("Nu ati setat conexiune la baza de date!");
        }

        $this->db = $db;
    }

    
    public function afisareParametri(){
        //$str = "BaseDB";
        return get_class_vars(get_class($this)); 
             //print get_class_vars($str);
    }
    
    public function getNumeTabel(){
        return $this->numeTabel;
    }
    /*
    public function insert(){
        if($this->numeTabel() == null) throw new Exception('Nume table invalid');
        
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $numeProprietati = get_class_vars(get_class($this));
        
        $numarSemneIntreabare = 0;
        
        foreach ($numeProprietati as $valoare) {
            $arraySemneIntrebare[] = "?";
            
        }
        
        $sql = "INSERT INTO " . $this->getNumeTabel() . " ( ".implode(",",$numeProprietati) . ")"
                . " values (". implode(",", $numeProprietati);
        
    }
   */
   
   public function insert(){

        if($this->getNumeTabel() == null) throw new Exception('Nume table invalid');
        
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $numeProprietati = get_class_vars(get_class($this));
        
        $semneIntrebare = array();
        
        foreach ($numeProprietati as $valoare) {
            $semneIntrebare[] = "?";
            
        }

        foreach($numeProprietati as $proprietate) {
            $getterProprietate[] = "get".ucfirst($proprietate).();
        }
        
        $sql = "INSERT INTO " . $this->getNumeTabel() . " ( ".join(",",$numeProprietati) . ")"
                . " values (". join(",", $semneIntrebare);

        $q = $this->db->prepare($sql);
        $q->execute(array($getterProprietate[]));
        
    }
   
   
   
   
    public static function showAll($db, $tableName, $limit = 20){
        
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM ". $tableName . " ORDER BY id DESC LIMIT " . $limit . ";";
        $q = $db->prepare($sql);
        $q->execute();
        $objectReturnArray = array();
        while ($data = $q->fetch(PDO::FETCH_ASSOC))
        {
       
            $object = new self($db);


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

}
