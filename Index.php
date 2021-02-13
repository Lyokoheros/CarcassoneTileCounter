<?php
    require_once("render.php");
    
    session_start();

    $Renderer = new Render();
    $_SESSION['renderer'] = serialize($Renderer);
    
    $Renderer->StartPage();

?>
