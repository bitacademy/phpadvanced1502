<?php

require_once "../autoload.php";

require_once "header_html.php";

$mesajDeAfisat = 'Nu exista erori de afisat';
if (isset($_GET['message'])){
    switch($_GET['message']){
    case 'upgrade':
        $mesajDeAfisat = "Este necesar sa faceti upgrade pentru a vedea aceasta sectiune.";
        break;
    default:
        $mesajDeAfisat = urldecode($_GET['message']);
        break;
    }
}


echo $mesajDeAfisat;
