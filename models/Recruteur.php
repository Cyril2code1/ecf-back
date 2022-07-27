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



        }
    }
}