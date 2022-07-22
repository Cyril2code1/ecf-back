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
   
}