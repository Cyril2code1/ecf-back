<h2>Voir les annonces</h2>
<?php

$ad = new Ad();
$ads  = $ad->selectAds(1);


if (!empty($ads)) {
    ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Travail</th>
          <th scope="col">lieu</th>
          <th scope="col">description</th>
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
        $uuid = $_SESSION['uuid'];
?>
        <tr>
            <th scope="row"> <?= $job; ?></th>
            <td><?= $place; ?></td>
            <td><?= $desc; ?></td>
            <td>
                <?php
               
                $candidature = Candidature::etatCandidature($id, $uuid);
                switch ($candidature) {
                    case 0:
                        ?> <span class="text-danger">Alerte anomalie (0)</span> <?php
                        break;
                    case 1:
                        ?> <a href="./index.php?section=candidat&&action=postuler&&id=<?= $id ?>">Postuler</a> <?php
                        break;
                    case 2:
                        ?> <span class="text-warning">candidature en cours</span> <?php
                        break;
                    case 3:
                        ?> <span class="text-success">candidature transmise</span> <?php
                        break;
                    case 4:
                        ?> <span class="text-danger">Alerte anomalie (1)</span> <?php
                        break;
                    default:
                        ?> <span class="text-danger">Alerte anomalie (2)</span> <?php
                    break;
                }
                ?>
                                            
            </td>
        </tr>
<?php
    }
}else {
        echo('<p>pas de donnée à afficher</p>');
    }