<?php

class Recruteur {

    public function __construct() {

    }

    public function data() {
        if (!empty($_POST['name']) && !empty($_POST['address'])) {
            require INC.'db_connect.php';

                       
            $uuid = $_SESSION['uuid'];
            $name = $_POST['name'];
            $address = trim($_POST['address']);
   
            $sql = "INSERT INTO `recruteurs` (`uuid`, `name`, `address`) VALUES (:uuid, :name, :address)";

            $query = $pdo->prepare($sql);

            $query->bindValue(':uuid', $uuid, PDO::PARAM_STR);
            $query->bindValue(':name', $name, PDO::PARAM_STR);
            $query->bindValue(':address', $address, PDO::PARAM_STR);

            $query->execute();

            header('location:index.php?section=recruteur');

        }
    }

    public function addAd() {
        require INC.'db_connect.php';

        if(!empty($_POST) 
        && !empty($_POST['job']) 
        && !empty($_POST['place']) 
        && !empty($_POST['description'])){

            $job = $_POST['job'];
            $place = $_POST['place'];
            $description = trim($_POST['description']);
            $validation = '0';
            $uuid = $_SESSION['uuid'];
 
            
            $sql = "INSERT INTO `annonces` (job, place, description, validation, uuid)
                             VALUES (:job,
                                    :place,
                                    :description,
                                    :validation,
                                    :uuid
                                )";

            $query = $pdo->prepare($sql);

            $query->bindvalue(':job', $job, PDO::PARAM_STR);
            $query->bindvalue(':place', $place, PDO::PARAM_STR);
            $query->bindvalue(':description', $description, PDO::PARAM_STR);
            $query->bindvalue(':validation', $validation, PDO::PARAM_BOOL);
            $query->bindvalue(':uuid', $uuid, PDO::PARAM_STR);

            $query->execute();

        }
    }



    public function recruteurAd($uuid) {
        require INC.'db_connect.php';

        $sql = "SELECT * FROM `annonces` WHERE `uuid`=:uuid";
        $query = $pdo->prepare($sql);
        $query->bindValue(':uuid', $uuid, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    

}