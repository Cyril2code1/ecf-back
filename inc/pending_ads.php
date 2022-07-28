<?php
$ad = new Ad();
$rows = $ad->pendingAds();

if (!empty($rows)) {
    ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Intitulé du poste</th>
          <th scope="col">Lieu</th>
          <th scope="col">Description</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
    <?php
    foreach ($rows as $row) {
        $id = $row->id;
        $job = $row->job;
        $place = $row->place;
        $desc = $row->description;
?>
        <tr>
            <th scope="row"> <?= $job; ?></th>
            <td><?= $place; ?></td>
            <td><?= $desc; ?></td>
            <td>
                <a href="./index.php?section=consultant&&action=valid_ad&&id=<?= $id ?>">Valider</a>  
                <a href="./index.php?section=consultant&&action=delete_ad&&id=<?= $id ?>">Supprimer</a>                            
            </td>
        </tr>
<?php
    }
}else {
        echo('pas de donnée à afficher');
    }