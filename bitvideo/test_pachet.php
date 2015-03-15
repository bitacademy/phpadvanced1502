<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$db2 = new Database()/
require "admin/database.php";
require "classes/BaseDB.php";
require "classes/Pachet.php";

$pdo = Database::connect();
$pachet = new Pachet($pdo);
//$video->setId( 5);
print_r($pachet->afisareParametri());

//$video->setUrl("nimic");
//$video->setId_pachet(1);
//$video->setData_publicare(date('Y-m-d H:i:s'));
//$video->setStatus(true);
//$video->save();
echo "<PRE>";
print_r(Pachet::showAll($pdo, 'pachete'));