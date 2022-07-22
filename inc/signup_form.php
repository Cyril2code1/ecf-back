<form method='post' class="d-flex flex-column align-items-center">

    <div class="mt-4 mb-3">
        <label for="email" class="form-label">E-mail:</label>
        <input type="email" 
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
        title="8 characteres minimum dont au moins 1 lettre et 1 chiffre">
    </div>

    <div class="mb-3">
        <label for="password2" class="form-label">Veuillez confirmer le mot de passe:</label>
        <input type="password" name="password2" id="password2" class="form-control" required>
    </div>

    <div>
        <button type="submit" class="btn btn-primary mb-4">valider</button>
    </div>

</form>