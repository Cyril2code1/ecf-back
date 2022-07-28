<h3> Inscriptions: </h3>
<?php

$tier = new Tiers();
$rows = $tier->pendingInscription();

if (!empty($rows)) {
    ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
    <?php
    foreach ($rows as $row) {
        $uuid = $row->uuid;
        $email = $row->email;
?>
        <tr>
            <th scope="row"> <?= $email; ?></th>
            <td><?= $uuid; ?></td>
            <td>
                <a href="./index.php?section=consultant&&action=valid_insc&&id=<?= $uuid ?>">Valider</a>  
                <a href="./index.php?section=consultant&&action=delete_insc&&id=<?= $uuid ?>">Supprimer</a>                            
            </td>
        </tr>
<?php
    }
}else {
        echo('pas de donnée à afficher');
    }