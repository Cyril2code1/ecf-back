<form method='post' class="d-flex flex-column align-items-center">
<?php
if (empty($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    ?>
    <div class="mt-4 mb-3">
        <div class="text-center">Etes-vous:</div>
        <div class="form-check-inline">
            <input class="form-check-input" type="radio" name="role" value="recruteur" checked>
            <label class="form-check-label" for="recruteur">
                Recruteur
            </label>
        </div>
        <div class="form-check-inline">
            <input class="form-check-input" type="radio" name="role" value="candidat">
            <label class="form-check-label" for="candidat">
                Candidat
            </label>
        </div>
    </div>
<?php 
} 
?>

    <div class="mb-3">
        <label for="email" class="form-label">E-mail:</label>
        <input 
        type="email" 
        name="email" 
        id="email" 
        class="form-control" 
        value="
        <?php
        if (!empty($_POST['email'])) {echo ($_POST['email']);}
        ?> "
        required>
    </div>

    <div class="mb-3">
        <label for="password1" class="form-label">Mot de passe:</label>
            <input type="password" 
                name="password1" 
                id="password1" 
                class="form-control" 
                required
                minlength="3"
                pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
                aria-describedby="passwordHelpBlock"
                title="8 caracteres minimum dont au moins 1 lettre et 1 chiffre">
        <div id="passwordHelpBlock" class="form-text">
            8 caracteres minimum dont au moins 1 lettre et 1 chiffre.
        </div>
    </div>

    <div class="mb-3">
        <label for="password2" class="form-label">Veuillez confirmer le mot de passe:</label>
        <input type="password" name="password2" id="password2" class="form-control" required>
    </div>

    <div>
        <button type="submit" class="btn btn-primary mb-4">valider</button>
    </div>

</form>