<?php 
    session_start();
    echo"views = ".$_SESSION['views']; 

    unset($_SESSION['views']);
    // session_destroy();
    // echo "valor = ".$valor;
?>