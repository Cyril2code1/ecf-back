<?php

class Security {

    public function __construct(){

    }

    static function auth() {
        if ($_GET['section'] !== $_SESSION['role']) {
            header("Location: ./index.php?section=error.php");
        }
    }

    static function secureData($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}