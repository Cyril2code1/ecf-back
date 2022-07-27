<?php

include_once CONF.'db_const.php';

if ((!isset($pdo)) || ($pdo === null)) {

try {
    
    $pdo = new PDO("mysql:dbname=".DB_NAME."; host=".DB_HOST, DB_USER, DB_PASSWRD);
    
    } catch (PDOException $e) {
    
        echo 'Erreur : '. $e->getMessage();
        die();
    
    }
}