<h2>Ajouter une annonce:</h2>

<?php
$recruteur = new Recruteur();
$recruteur->addAd();

?>

<form method='post' class="d-flex flex-column align-items-center">

    <div class="mt-4 mb-3">
        <label class="form-label" for="job">Intitulé du poste:</label>
        <input class="form-control" type="text" name="job" required>
    </div>

    <div class="mb-3">
        <label for="place" class="form-label">Lieu de travail:</label>
        <input type="text" name="place" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description détailée du poste:</label>
        <textarea id="description" name="description" rows="5" cols="50" class="form-control" aria-describedby="descriptionHelpBlock" required>
        </textarea>
        <div id="descriptionHelpBlock" class="form-text">
            Pour que votre annonce soit validée, la description doit être détaillée et préciser les horaires ainsi que le salaire
        </div>
    </div>

    <div>
        <button type="submit" class="btn btn-primary mb-4">valider</button>
    </div>

</form>

<h2>Voir les annonces</h2>
<?php

$uuid = $_SESSION['uuid'];

$ads = $recruteur->recruteurAd($uuid);


if (!empty($ads)) {
    ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Travail</th>
          <th scope="col">lieu</th>
          <th scope="col">description</th>
          <th scope="col">validation</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody>
    <?php
    foreach ($ads as $ad) {
        $id = $ad->id;
        $job = $ad->job;
        $place = $ad->place;
        $desc = $ad->description;
        $validation = $ad->validation;
        $validation === '0' ? $validation = 'en cours' : $validation = 'OK';
?>
        <tr>
            <th scope="row"> <?= $job; ?></th>
            <td><?= $place; ?></td>
            <td><?= $desc; ?></td>
            <td><?= $validation; ?></td>
            <td>
                <a href="./index.php?section=recruteur&&action=del_ad&&id=<?= $id ?>">Supprimer</a>                            
            </td>
        </tr>
<?php
    }
}else {
        echo('<p>pas de donnée à afficher</p>');
    }



