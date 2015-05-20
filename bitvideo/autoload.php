<?php
//se apeleaza aceasta functie inainte de a se afisa orice fel de HTML
session_start();


require_once "admin/database.php";
require_once "classes/BaseDB.php";
require_once "classes/Pagina.php";
require_once "classes/Pachet.php";
require_once "classes/Plata.php";
require_once "classes/Customer.php";
require_once "classes/Video.php";

error_reporting(E_ALL);
ini_set('display_errors',1);


