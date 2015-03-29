<?php
require_once "../autoload.php";
$pdo = Database::connect();
$videos = Video::showAll($pdo, 'video');
$videogasit = false;
foreach($videos as $video){
    if($_GET['id']==$video->getID()){
        echo $video->getId();
        echo "<br/> <br/>";
        $youtubeUrl = $video->parseYoutubeUrlForEmbed ( $video->getUrl());
        echo '<iframe width="420" height="315"
            src="'.   $youtubeUrl .  '"
            frameborder="0" allowfullscreen></iframe>';
    $videogasit = true;
    }   
        
}
if(!$videogasit) echo "Nu exista video-ul";