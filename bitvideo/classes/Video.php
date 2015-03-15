<?php

class Video extends BaseDB {
    
    private $id;
    private $url;
    private $id_pachet;
    private $data_publicare;
    private $status;
    protected $numeTabel = "video";
    
    public function getNumeTabel() {
        return $this->numeTabel;
    }
    
    
     public function insert() {
        $db = $this->db;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO video (url, id_pachet, data_publicare, status) values(?, ?, ?, ?)";
        $q = $db->prepare($sql);
        $q->execute(array(
            $this->getUrl(),
            $this->getIdPachet(),
            $this->getDataPublicare(),
            $this->getStatus()
        ));
    }
    
    
    public function update() {
        $db = $this->db;
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE video  set url = ?, id_pachet = ?, data_publicare = ?, status = ? WHERE id = ?";
        $q = $db->prepare($sql);
        $q->execute(array(
            $this->getUrl(),
            $this->getIdPachet(),
            $this->getDataPublicare(),
            $this->getStatus(),
            $this->getId()
        ));
    }
    
    
    public function save() {
        if($this->getId = true){
            $this->update();
        }else {
            $this->insert();
        }
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }
    
    
    public function setUrl($url) {
        $this->url = $url;
    }
    
    public function getUrl() {
        $this->url;
    }
    
    public function setIdPachet($id_pachet) {
        $this->id_pachet = $id_pachet;
    }    
    
    public function getIdPachet() {
        return $this->id_pachet;
    }
    
    public function setDataPublicare($data_publicare){
        $this->data_publicare = $data_publicare;
    }
    
    public function getDataPublicare(){
        return $this->data_publicare;
    }
    
    public function setStatus($status) {
        $this->status = $status;
    }
    
    public function getStatus() {
        return $this->status;
    }
}





