<?php

class Signup {

    function __construct(){
    }

    static function signup1() {

        if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password1']) && !empty($_POST['password2'])){

            if($_POST['password1'] === $_POST['password2']) {

                $db = new Database();
                $email = $_POST['email'];
                $sql = "SELECT * FROM tiers WHERE email = '$email'";
                $tier = $db->query($sql);

                if (empty($tier)){
                    $db = new Database();
                    $password = password_hash( $_POST['password1'], PASSWORD_DEFAULT);
                    $stmt = "INSERT INTO tiers (uuid, email, password, role, validation)
                     VALUE (uuid(),
                            '$email',
                            '$password',
                            'consultant',
                            1
                        )";
                    $db->query($stmt);
                    $message = 'le consultant a bien été créé.';

                } else {
                    $error = 'cette adresse mail est déjà utilisée';
                }  

            } else {
            $error = 'les mots de passe ne sont pas identiques';
            }           
        }
        
        if(!empty($message)){ 
        ?>
              <div class="border border-success border-3 p-2">
                  <?= $message ?>
              </div>
        <?php 
        }   
        
        if(!empty($error)){ 
        ?>
                <div class="border border-danger border-3 p-2">
                    <?= $error ?>
                </div>
        <?php 
        }   
    }

    static function signup2() {

        if(!empty($_POST) 
        && !empty($_POST['email']) 
        && !empty($_POST['password1']) 
        && !empty($_POST['password2'])
        && !empty($_POST['role'])){

            if($_POST['password1'] === $_POST['password2']) {

                $db = new Database();
                $email = $_POST['email'];
                $password = password_hash( $_POST['password1'], PASSWORD_DEFAULT);
                $role = $_POST['role'];
                $sql = "SELECT * FROM tiers WHERE email = '$email'";
                $tier = $db->query($sql);

echo '<pre>';
var_dump($role);
                if (empty($tier)){
                    $stmt = "INSERT INTO tiers (uuid, email, password, role, validation)
                     VALUE (uuid(),
                            '$email',
                            '$password',
                            '$role',
                            0
                        )";
                    $db->query($stmt);
                    $message = 'le compte a bien été créé, il est en attente de validation';

                } else {
                    $error = 'cette adresse mail est déjà utilisée';
                }  

            } else {
                $error = 'les mots de passe ne sont pas identiques';
            }           
        }
        
        if(!empty($message)){ 
        ?>
              <div class="border border-success border-3 p-2">
                  <?= $message ?>
              </div>
        <?php 
        }   
        
        if(!empty($error)){ 
        ?>
                <div class="border border-danger border-3 p-2">
                    <?= $error ?>
                </div>
        <?php 
        }   
    }
}