<?php

require "admin/database.php";
require "classes/BaseDB.php";
require "classes/Video.php";

error_reporting(E_ALL);
ini_set('display_errors', true);

$pdo = Database::connect();
//test video 1
//inserare
echo "<PRE>";
$video = new Video($pdo );

//$video->setId( 5);
//$video->setId( 5);
//$video->setId( 5);

$video->setUrl("http://www.youtube.com/watch?v=12345");
$video->setIdPachet(1);
$video->setDataPublicare(date('Y-m-d H:i:s'));
$video->setStatus(true);
$video->insert($debug = true);

//test video 2
//update
die('Testare video update()');
$video = new Video($pdo );

$video->setId( 5);

$video->setUrl("http://www.youtube.com/watch?v=aaaaa");

$video->setIdPachet(1);
$video->setDataPublicare(date('Y-m-d H:i:s'));
$video->setStatus(true);
$video->update($debug = true);



die('Testare video save()');

//acelasi lucru, direct cu save();
//
$video = new Video($pdo );

$video->setId( 6);

$video->setUrl("http://www.youtube.com/watch?v=bbbbb");
$video->setIdPachet(1);
$video->setDataPublicare(date('Y-m-d H:i:s'));
$video->setStatus(true);
$video->save($debug = true);



die('Testare videos showall');

//$videos este sub forma unui array de obiecte
$videos = Video::showAll($pdo, 'video');
//print_r($videos);

echo "<html><body>";
//de pe youtube, la share, exista optiunea embed care genereaza un cod de forma
//<iframe width="420" height="315" src="https://www.youtube.com/embed/GGtKxbu7vLI" frameborder="0" allowfullscreen></iframe>
//stiind acest lucru, trebuie doar sa inlocuim src="" cu $video['url']
//
//
//ar mai trebui prelucrat URL-ul ca in loc de youtube.com/watch?v=ID sau fie youtube.com/embed/ID
//acest lucru se face in functia parseYoutubeUrlForEmbed()
foreach($videos as $video){

    $youtubeUrl = $video->parseYoutubeUrlForEmbed ( $video->getUrl());
    //daca nu este setat, sarim peste ciclul curent din bucla foreach
    if ($youtubeUrl == null) continue;

    echo '<iframe width="420" height="315"
            src="'.   $youtubeUrl .  '"
            frameborder="0" allowfullscreen></iframe>';

    //spatiere html
    echo "<br/> <br/>";
    echo "<br/> <br/>";

}
echo "</body></html>";
