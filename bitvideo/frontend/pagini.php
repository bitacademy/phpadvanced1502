<?php

require_once "../autoload.php";

error_reporting(E_ALL);
ini_set('display errors',true);

$pdo = Database::connect();

echo"<PRE>";

$pagini = Pagina::showAll($pdo, 'pagini');

echo "<html><body>";

$paginagasita = false;

foreach($pagini as $pagina){
    if(  isset($_GET['id'])    &&      ($_GET['id'] == $pagina->getID())   ){
        
        echo $pagina->getTitlu(); 
        echo "<br/> <br/>";
        echo $pagina->getUrl();
        echo "<br/> <br/>";
        echo $pagina->getContinut();
        echo "<br/> <br/>";
       
         $paginagasita = true;
    }
   
    
}

if (!$paginagasita) echo 'pagina invalida';