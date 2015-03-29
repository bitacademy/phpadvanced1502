<?php

session_start();
if(session_destroy()) // se sterg toate sesiunile
{
    header("Location: index.php"); //se redirecteaza
}
?>
}
