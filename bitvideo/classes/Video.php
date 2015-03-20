<?php

class Video extends BaseDB {

    protected $id;
    protected $url;
    protected $idPachet;
    protected $dataPublicare;
    protected $status;
    protected $numeTabel = "video";



    public function setUrl($url) {
        $this->url = $url;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setIdPachet($id_pachet) {
        $this->idPachet = $id_pachet;
    }

    public function getIdPachet() {
        return $this->idPachet;
    }

    public function setDataPublicare($data_publicare){
        $this->dataPublicare = $data_publicare;
    }

    public function getDataPublicare(){
        return $this->dataPublicare;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }

    //functia prelucreaza un url youtube de forma www.youtube.com/watch?v=ID
    //in www.youtube.com/embed/ID
    public function parseYoutubeUrlForEmbed($youtubeUrl = null){
        if ($youtubeUrl == null) return null;

        //daca separam stringul in doua elemente in functie de =
        //atunci vom obtine
        //array(0 => 'www.youtube.com/watch?v', 1=>'ID')
        $youtubeArrayTemp = explode('=', $youtubeUrl);
        //daca nu este setat acest al doilea element, returnam null
        if (! isset($youtubeArrayTemp[1])) return null;
        $youtubeId = $youtubeArrayTemp[1];

        $youtubeprefix = 'https://www.youtube.com/embed/';

        return $youtubeprefix. $youtubeId;
    }
}





