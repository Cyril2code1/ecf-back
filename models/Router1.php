<?php

class Router1 {

    public function __construct() {

    }

   static function main_route(){

    /*
    if (isset($_SESSION['role'])){
        $_GET['section'] = $_SESSION['role'];
    }
    */

    if (isset($_GET['section'])){
        $section = $_GET['section'];
    } else {
        $section = 'home';
    }

    if ($section === 'home' 
    || $section === 'admin' 
    || $section === 'consultant' 
    || $section === 'recruteur' 
    || $section === 'candidat' ) {
        
        return require PAGES.$section.'.php';
        
    } else {
       
        return require PAGES.'error.php';
    }
   }


   static function consultant_route(){
    if (isset($_SESSION['role']) && $_SESSION['role']==='consultant'){
        if(isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'valid_insc':
                    return require INC.'valid_insc.php';
                    break;
                case 'delete_insc':
                    return require INC.'delete_insc.php';
                    break;
                default:
                    return require PAGES.'error.php';
            }

        } else {
            return require INC.'pending_insc.php';
        }

    } else {
        header("Location: ./index.php?section=error.php");
    }
   }
   
   static function recruteur_route() {
    if (isset($_SESSION['role']) && $_SESSION['role']==='recruteur'){
        require INC.'db_connect.php';

        $uuid = $_SESSION['uuid']; 
        
        $sql = "SELECT * FROM `recruteurs` WHERE `uuid`= :uuid";
        $query = $pdo->prepare($sql);
        $query->bindvalue(':uuid', $uuid, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        

        if (!empty($result)) {
            include_once PAGES.'template/recruteur_navbar.php';

            echo('données du recruteur remplies');

        } else {
            return require INC.'recruteur_form_data.php';
        }

        


    } else {
        header("Location: ./index.php?section=error.php");
    }
   }
}