<?php
    $solt = "HashSalt";
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ); 
    try{
        $pdo = new PDO('mysql:host=mysql5.7-trial2;dbname=test', 'root', 'root');
        $sql = "SET SESSION sql_mode = '';";
        $stmt = $pdo->prepare($sql);
        $stmt -> execute();
    }
    catch(PDOException $e){
        echo("<p>500 Inertnal Server Error</p>");
        exit($e->getMessage());
    }
?>