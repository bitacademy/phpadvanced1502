<?php


/**
 * Description of BaseDB
 *
 * @author dsocol
 */
class BaseDB {
   private $db;
    
    
    public function __construct($db) {
        
             
        if($db == null){
            throw new Exception("Nu ati setat conexiune la baza de date!");
        }
        
          $this->db = $db;
    }
    
}
