<h2 class="text-center text-primary text-decoration-underline mt-5">merci de compléter vos données</h2>
     


    <?php
        $candidat = new Candidat;
        echo ($candidat->data());
    ?>


<form method='post' enctype="multipart/form-data" class="d-flex flex-column align-items-center">
    <div class="mt-4 mb-3">
        <label for="lastname" class="form-label">Nom:</label>
        <input type="text" name="lastname" id="lastname" class="form-control" required>
    </div>
    <div class="mt-4 mb-3">
        <label for="firsttname" class="form-label">Prénom:</label>
        <input type="text" name="firstname" id="firstname" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="cv">Joindre votre CV (au format pdf uniquement - max 500Kio):</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="512000" > <!-- 500Kio = 500*1024octets -->
        <input type="file" id="cv" name="cv" accept=".pdf" required>
    </div>
    <div>
        <button type="submit" class="btn btn-primary mb-4">valider</button>
    </div>
</form>