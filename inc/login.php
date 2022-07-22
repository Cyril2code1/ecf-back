<?php
// if we got a post method and email and password aren't empty
if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])){

    

    // looking in the DB for data about the email    
        $db = new Database();
        $email = $_POST['email'];
        $sql = "SELECT * FROM tiers WHERE email = '$email'";
        $tier = $db->query($sql);
    
        $pwd = $tier[0]->password;
    
    //  if password is ok, put tier's role data in a session cookie and back to index with the section's value   
        if(password_verify($_POST['password'], $pwd)){
            $_SESSION['role'] = $tier[0]->role;
            header("Location: ./index.php?section=".$tier[0]->role);
            exit();
        } else {
            $error = 'email et/ou password incorrect';
        }
    }
?>    
<h2 class="text-center text-primary text-decoration-underline mt-5">Page de connexion</h2>
<?php
if (!empty($error)) { 
?>
<div class="border border-danger border-3">
    <?= $error ?>
</div>
<?php 
}   
?>

<form method='post' class="d-flex flex-column align-items-center">
    <div class="mt-4 mb-3">
        <label for="email" class="form-label">E-mail:</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe:</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div>
        <button type="submit" class="btn btn-primary mb-4">se connecter</button>
    </div>
</form>

<div class="d-flex flex-row-reverse">
    <a href="./index.php?action=signup">s'incrire</a>
</div>