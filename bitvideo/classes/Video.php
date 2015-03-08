<?php

class Video {
    
    private $id;
    private $url;
    private $id_pachet;
    private $data_publicare;
    private $status;


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
    
    public function setId_pachet($id_pachet) {
        $this->id_pachet = $id_pachet;
    }    
    
    public function getId_pachet() {
        return $this->id_pachet;
    }
    
    public function setData_publicare($data_publicare){
        $this->data_publicare = $data_publicare;
    }
    
    public function getData_publicare(){
        return $this->data_publicare;
    }
    
    public function setStatus($status) {
        $this->status = $status;
    }
    
    public function getStatus() {
        return $this->status;
    }
}





