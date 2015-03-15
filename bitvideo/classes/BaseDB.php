<?php

/**
 * Description of BaseDB
 *
 * @author vlapop
 */
class BaseDB {

    protected $db;
    protected $numeTabel ;
    public function __construct(PDO $db) {


        if ($db == null) {
            throw new Exception("Nu ati setat conexiune la baza de date!");
        }

        $this->db = $db;
    }

    
    public function getNumeTabel(){
        return $this->numeTabel;
    }
    
    public function insert(){
//        if ( $this->getNumeTabel() == null ) throw new Exception ('Numele tabelului este invalid');
//           $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//           
//           $numeProprietati = get_class_vars(get_class($this));
//           // [id, url, dataPublicare]
//           
//           $arraySemneIntrebare = null;
//           foreach ($numeProprietati as $valoare){
//               $arraySemneIntrebare[] = "?";
//            // id, url, data_publicare
//               //dataPublicare => data_publicare
//               $coloanaTabel = $this->fromCamelCase($valoare);
//               //data_publicare => $this->dataPublicare
//               $corespondentaTabelObiect[$coloanaTabel] = $valoare;
//               //$this->dataPublicare => data_publicare
//               $corespondentaObiectTabel[$valoare] = $coloanaTabel;
//           }
//           //$arraySemneIntrebare = array("?","?","?")
//           // "?,?,?"
//           
//           $sql = "INSERT INTO "  . $this->getNumeTabel()  .  " ( ". implode(",", $corespondentaObiectTabel) . ")"
//                    . " values(".    implode(",", $arraySemneIntrebare) .")";
//           $q = $this->db->prepare($sql);
//           $q->execute($corespondentaTabelObiect);
//            
//        
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

    function to_camel_case($str, $capitalise_first_char = false) {
        if ($capitalise_first_char) {
            $str[0] = strtoupper($str[0]);
        }
        $func = create_function('$c', 'return strtoupper($c[1]);');
        //print $func;
        return preg_replace_callback('/_([a-z])/', $func, $str);
    }
    
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
