<?php

class Consultant {

    public function __construct() {
        
    }

   public function valid_insc($id) {
    $db = new Database();
    $stmt = "UPDATE `tiers` SET `validation`='1' WHERE `uuid`='$id';";
    $db->query($stmt);
   }

   public function delete_insc($id) {
    $db = new Database();
    $stmt = "DELETE FROM `tiers` WHERE `uuid`='$id';";
    $db->query($stmt);
   }
}






















