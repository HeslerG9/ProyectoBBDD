<?php
session_start();
//si hay una sesión

if (isset($_SESSION['name'])==false) {
    echo '';
    }else {
    //se redirecciona
    
    echo $_SESSION['name'];
}
?>