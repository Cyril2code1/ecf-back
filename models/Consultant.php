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

   public function validAd($id) {
    require INC.'db_connect.php';

    $sql = "UPDATE `annonces` SET `validation`='1' WHERE `id`=:id;";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->execute();
    return $query;
   }

   static function validCandidacy($id, $uuid) {
    require INC.'db_connect.php';

    $sql = "UPDATE `candidatures` SET `validation`='1' WHERE `id`=:id AND `uuid`=:uuid";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->bindValue(':uuid', $uuid, PDO::PARAM_STR);
    $query->execute();
    return $query;     
   }

   public function prepareMail($id, $uuid) {
    require INC.'db_connect.php';

    $sql = "SELECT * FROM `candidatures`
    INNER JOIN `candidats` ON candidats.uuid = candidatures.uuid
    INNER JOIN `annonces` ON annonces.id = candidatures.id 
    INNER JOIN `tiers` ON tiers.uuid = annonces.uuid
    WHERE candidatures.id=:id AND candidatures.uuid=:uuid";

    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->bindValue(':uuid', $uuid, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);

   return $result;
   }
}






















