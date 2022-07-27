<?php

class Tiers {

    public function __construct() {

    }

    public function login() {
        require_once INC.'db_connect.php';
        if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])){
       
            $email = $_POST['email'];
            $sql = "SELECT * FROM tiers WHERE email = '$email'";
            $query = $pdo->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
        
            if (empty($result)) {
                return ('email et/ou password incorrect');
            } else {
    
                $pwd = $result[0]->password;
                $validation = $result[0]->validation;
         
                if(password_verify($_POST['password'], $pwd)){
                    if ($validation) {
                    $_SESSION['role'] = $result[0]->role;
                    $_SESSION['uuid'] = $result[0]->uuid;
                    header("Location: ./index.php?section=".$result[0]->role);
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
        require INC.'db_connect.php';
        if(!empty($_POST) 
        && !empty($_POST['email']) 
        && !empty($_POST['password1']) 
        && !empty($_POST['password2'])){

            $email = $_POST['email'];
            $password = password_hash( $_POST['password1'], PASSWORD_DEFAULT);

            if (!empty($_POST['role'])) {
                $role = $_POST['role'];
            } else {
                $role = 'consultant';
            }

            $role === 'consultant' ? $validation = 1 : $validation = 0;
            $sql = "SELECT * FROM tiers WHERE email = '$email'";
            $query = $pdo->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            if (!empty($result)) { 
                $message = ' <div class="border border-danger border-3">cette adresse mail est déjà utilisée</div>';
            } else if ($_POST['password1'] !== $_POST['password2']) {
                    $message = '<div class="border border-danger border-3">les mots de passe ne sont pas identiques</div>';
                } else {

                    $sql = "INSERT INTO tiers (uuid, email, password, role, validation)
                             VALUES (uuid(),
                                    :email,
                                    :password,
                                    :role,
                                    :validation
                                )";

                    $query = $pdo->prepare($sql);

                    $query->bindvalue(':email', $email, PDO::PARAM_STR);
                    $query->bindvalue(':password', $password, PDO::PARAM_STR);
                    $query->bindvalue(':role', $role, PDO::PARAM_STR);
                    $query->bindvalue(':validation', $validation, PDO::PARAM_BOOL);

                    $query->execute();
                    
                    $message = '<div class="border border-success border-3 p-2">le compte a bien été créé';
                    if ($role !== 'consultant') { $message .= ', il est en attente de validation';}
                    $message .= '</div>';
                }
                return $message;
        }
    }

    public function pendingInscription() {
        require INC.'db_connect.php';

        $sql = "SELECT * FROM tiers WHERE validation = '0'";
        $query = $pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
}
