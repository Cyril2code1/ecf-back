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
   
}