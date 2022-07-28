<?php

class Router1 {

    public function __construct() {

    }

   static function main_route(){

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
                case 'pending_ads':
                    return require INC.'pending_ads.php';
                    break;
                case 'valid_ad':
                    return require INC.'valid_ad.php';
                    break;
                case 'delete_ad':
                    return require INC.'delete_ad.php';
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
        if(isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'del_ad':
                    return require INC.'del_ad.php';
                    break;
                case 'add_ad':
                    return require INC.'add_ad_form.php';
                    break;
                default:
                    return require PAGES.'error.php';
            }
        }
        require INC.'db_connect.php';

        $uuid = $_SESSION['uuid']; 
        
        $sql = "SELECT * FROM `recruteurs` WHERE `uuid`= :uuid";
        $query = $pdo->prepare($sql);
        $query->bindvalue(':uuid', $uuid, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        

        if (!empty($result)) {

            return require_once INC.'recruteur_main.php';

        } else {
            return require INC.'recruteur_form_data.php';
        }
    } else {
        header("Location: ./index.php?section=error.php");
    }
   }
}