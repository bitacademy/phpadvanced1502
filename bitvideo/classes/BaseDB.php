<?php

/**
 * Description of BaseDB
 *
 * @author dsocol
 */
class BaseDB {

    protected $db;

    public function __construct(PDO $db) {


        if ($db == null) {
            throw new Exception("Nu ati setat conexiune la baza de date!");
        }

        $this->db = $db;
        
    }

}
