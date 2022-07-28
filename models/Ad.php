<?php

class Ad {

    public function __construct() {

    }
/*
    public function validAd() {
        require INC.'db_connect.php';

        $sql = "SELECT * FROM `annonces` WHERE `validation` = '1'";
        $query = $pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function pendingAds() {
        require INC.'db_connect.php';

        $sql = "SELECT * FROM `annonces` WHERE `validation`=:valid";
        $query = $pdo->prepare($sql);
        $query->bindValue(':valid', false, PDO::PARAM_BOOL);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
*/
    public function selectAds($validation) {
        require INC.'db_connect.php';

        $sql = "SELECT * FROM `annonces` WHERE `validation`=:valid";
        $query = $pdo->prepare($sql);
        $query->bindValue(':valid', $validation, PDO::PARAM_BOOL);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function delAd($id) {
        require INC.'db_connect.php';

        $sql = "DELETE FROM `annonces` WHERE `id`=:id;";

        $query = $pdo->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_STR);

        $query->execute();

        return $query;
    }

}