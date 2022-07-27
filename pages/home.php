<?php

if (isset ($_GET['action']))  {
    switch ($_GET['action']) {
        case 'signup':
            include_once PAGES.'signup.php';
            break;
        case 'logout':
            include_once INC.'logout.php';
            break;
        default:
            include 'error.php';
    }
} else {
  
   include_once PAGES.'login.php';
    }


