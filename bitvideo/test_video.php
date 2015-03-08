<?php

//$db2 = new Database()/
require "admin/database.php";
require "classes/BaseDB.php";
require "classes/Video.php";


$pdo = Database::connect();

$video = new Video($pdo );

//$video->setId( 5);

$video->setUrl("nimic");
$video->setId_pachet(1);
$video->setData_publicare(date('Y-m-d H:i:s'));
$video->setStatus(true);
$video->save();