<?php

class Candidature {

    public function __construct() {

    }

    static function postuler($id, $uuid) {
        require INC.'db_connect.php';
   
            $sql = "INSERT INTO `candidatures` (`id`, `uuid`, `validation`) VALUES (:id, :uuid, :validation)";

            $query = $pdo->prepare($sql);

            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->bindValue(':uuid', $uuid, PDO::PARAM_STR);
            $query->bindValue(':validation', false, PDO::PARAM_BOOL);

            $query->execute();

    }

    static function etatCandidature($id, $uuid) {
        require INC.'db_connect.php';
        
            $sql = "SELECT * FROM `candidatures` WHERE `id`='$id' AND `uuid`='$uuid'";

            $query = $pdo->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            if (empty($result)) {
                $case = 1;
            } elseif ($result[0]->validation === '0') {
                $case = 2;              
            } elseif ($result[0]->validation === '1') {
                $case = 3;
            } else {
                $case = 4;
            }

            return $case;
    }

    public function aValider() {
        require INC.'db_connect.php';

            $sql = "SELECT * FROM `candidatures` WHERE `validation`=:validation";

            $query = $pdo->prepare($sql);
            $query->bindValue(':validation', false, PDO::PARAM_BOOL);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
    }
}