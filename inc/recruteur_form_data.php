<h2 class="text-center text-primary text-decoration-underline mt-5">merci de compléter vos données</h2>
     

<div class="border border-success border-3">
    <?php
        $recruteur = new Recruteur;
        echo ($recruteur->data());
    ?>
</div>

<form method='post' class="d-flex flex-column align-items-center">
    <div class="mt-4 mb-3">
        <label for="name" class="form-label">Nom de l'entreprise:</label>
        <input 
        type="text" 
        name="name" 
        id="name" 
        class="form-control" 
        required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Adresse:</label>
        <textarea id="address" name="address" rows="5" cols="50" class="form-control" required>
        </textarea>
    </div>
    <div>
        <button type="submit" class="btn btn-primary mb-4">valider</button>
    </div>
</form>