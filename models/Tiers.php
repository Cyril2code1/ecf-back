<?php

class Tiers {

    public function __construct() {

    }

    public function login() {
        if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])){
       
            $db = new Database();
            $email = $_POST['email'];
            $stmt = "SELECT * FROM tiers WHERE email = '$email'";
            $sql = $db->query($stmt);
        
            if (empty($sql)) {
                return ('email et/ou password incorrect');
            } else {
    
                $pwd = $sql[0]->password;
                $validation = $sql[0]->validation;
         
                if(password_verify($_POST['password'], $pwd)){
                    if ($validation) {
                    $_SESSION['role'] = $sql[0]->role;
                    header("Location: ./index.php?section=".$sql[0]->role);
                    } else {
                        return "ce compte n'a pas encore été validé";
                    }
                } else {
                    return 'email et/ou password incorrect';
                }
            }       
        }
    }

    public function tierSignUp() {
        if(!empty($_POST) 
        && !empty($_POST['email']) 
        && !empty($_POST['password1']) 
        && !empty($_POST['password2'])){

            $db = new Database();
            $email = $_POST['email'];
            $password = password_hash( $_POST['password1'], PASSWORD_DEFAULT);

            if (!empty($_POST['role'])) {
                $role = $_POST['role'];
            } else {
                $role = 'consultant';
            }

            $role === 'consultant' ? $validation = 1 : $validation = 0;
            $stmt = "SELECT * FROM tiers WHERE email = '$email'";
            $sql = $db->query($stmt);

            if (!empty($sql)) { 
                $message = ' <div class="border border-danger border-3">cette adresse mail est déjà utilisée</div>';
            } else if ($_POST['password1'] !== $_POST['password2']) {
                    $message = '<div class="border border-danger border-3">les mots de passe ne sont pas identiques</div>';
                } else {

                    $stmt = "INSERT INTO tiers (uuid, email, password, role, validation)
                             VALUE (uuid(),
                                    '$email',
                                    '$password',
                                    '$role',
                                    '$validation'
                                )";

                    $db->query($stmt);
                    var_dump($db);
                    $message = '<div class="border border-success border-3 p-2">le compte a bien été créé';
                    if ($role !== 'consultant') { $message .= ', il est en attente de validation';}
                    $message .= '</div>';
                }
                return $message;
        }
    }

    
}














            
/*
                

echo '<pre>';
var_dump($role);
                if (empty($tier)){
                    

                } else {
                    
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
        
        

    }
}

*/