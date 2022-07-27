<?php

class Ad {

    public function __construct() {

    }

    public function validAd() {
        require INC.'db_connect.php';

        $sql = "SELECT * FROM `annonces` WHERE `validation` = '1'";
        $query = $pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}