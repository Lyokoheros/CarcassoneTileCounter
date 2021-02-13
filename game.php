<?php

    require_once("render.php");

    session_start();


    if(!isset($_SESSION['renderer']))
    {
        //echo "formularz nie działa";
        header("Location: index.php");
    }
    else
    {
        $Renderer = unserialize($_SESSION['renderer']);
        $Renderer->GamePage();
    }

?>