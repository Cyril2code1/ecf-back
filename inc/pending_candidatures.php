<?php
$candidature = new Candidature();
$rows = $candidature->aValider();

if (!empty($rows)) {
    ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Intitulé du poste</th>
          <th scope="col">Lieu</th>
          <th scope="col">Description</th>
          <th scope="col">Nom candidat</th>
          <th scope="col">Prénom candidat</th>
          <th scope="col">Cv</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
    <?php
    foreach ($rows as $row) {

        $id = $row->id;
        $uuid = $row->uuid;
       
        $ad = new Ad();
        $ad = $ad->selectAdById($id);

        $job = $ad[0]->job;
        $place = $ad[0]->place;
        $desc = $ad[0]->description;


        $candidat = new Candidat();
        $candidat = $candidat->cv($uuid);

        $lastname = $candidat[0]->lastname;
        $firstname = $candidat[0]->firstname;


?>
        <tr>
            <th scope="row"> <?= $job; ?></th>
            <td><?= $place; ?></td>
            <td><?= $desc; ?></td>
            <td><?= $lastname; ?></td>
            <td><?= $firstname; ?></td>
            <td>
                <iframe id="cv"
                    title="cv"
                    width="300"
                    height="200"
                    src="./cv_pdf/<?= $uuid ?>">
                </iframe>
            </td>
            <td>
                <a href="./index.php?section=consultant&&action=valid_cand&&id=<?= $id ?>&&uuid=<?= $uuid ?>">Valider</a>                                            
            </td>
        </tr>
<?php
    }
}else {
        echo('pas de donnée à afficher');
    }