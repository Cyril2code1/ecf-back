<?php

class Consultant {

    public function __construct() {
        
    }

   public function valid_insc($id) {
    require INC.'db_connect.php';

    $sql = "UPDATE `tiers` SET `validation`='1' WHERE `uuid`=:id;";

    $query = $pdo->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_STR);

    $query->execute();

    return $query;

   }

   public function delete_insc($id) {
    require INC.'db_connect.php';

    $sql = "DELETE FROM `tiers` WHERE `uuid`=:id;";

    $query = $pdo->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_STR);

    $query->execute();

    return $query;
   }
}






















