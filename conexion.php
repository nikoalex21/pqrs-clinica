<?php 

$miconexion=new PDO('mysql:host=localhost; dbname=pqrs', 'root', '');
    $miconexion->exec("SET NAMES 'utf8';");
    $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>