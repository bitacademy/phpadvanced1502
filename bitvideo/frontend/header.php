<?php
require_once "../autoload.php";

try{


$paginaCurentaArrayTipSiId = Pagina::getPaginaCurenta();
$paginaCurentaArrayTipSiId['tip_pagina'] = 'pagina';
//$paginaCurentaArrayTipSiId['tip_pagina'] = 'video';
//$paginaCurentaArrayTipSiId['id'] = 1;
if ($paginaCurentaArrayTipSiId['tip_pagina'] == 'video') {
    $idVideo = $paginaCurentaArrayTipSiId['id'];
    $tipPagina = 'video';
}

else if ($paginaCurentaArrayTipSiId['tip_pagina'] == 'pagina') {
    $idVideo = false;
    $tipPagina = 'pagina';
}
else {
//eroare in arrayul $paginaCurentaArrayTipSiId
    $idVideo = null;
}

 if($customerDataSerializedIfLoggedIn = Customer::isLoggedIn() ) {
    //daca este logat, verificam daca are acces la pagina curenta
    $customerData = unserialize($customerDataSerializedIfLoggedIn);
    $pdo = Database::connect();
    $user = BaseDB::fill($customerData, 'Customer', $pdo );
     if ($idVideo === null ||   !$user->hasAccess($idVideo, $tipPagina)) {
         header("Location: error.php?message=upgrade");
         exit();
     }
     else {
         //permitem incarcarea paginii daca a fost setat $idVideo
         //la care are acces sau daca daca este o pagina

     }
 }

//daca nu este logat, redirect la login
else {
    header("Location: login.php");
    exit();
}
}
catch(Exception $exc){
    echo "<PRE>A aparut o eroare:";
    print_r($exc);
    echo "</PRE>";
}
require_once "header_html.php";

?>

