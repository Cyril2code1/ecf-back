<h2 class="text-center text-primary text-decoration-underline mt-5">Page de connexion</h2>
     

<div class="border border-danger border-3">
    <?php
        $tier = new Tiers;
        echo ($tier->login());
    ?>
</div>

<form method='post' class="d-flex flex-column align-items-center">
    <div class="mt-4 mb-3">
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
        <label for="password" class="form-label">Mot de passe:</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div>
        <button type="submit" class="btn btn-primary mb-4">se connecter</button>
    </div>
</form>