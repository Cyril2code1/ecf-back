<?php
$tier = new Tiers();
$rows = $tier->pendingInscription();

if (!empty($rows)) {
    require_once PAGES.'template/pending_inscription_thead.php';
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