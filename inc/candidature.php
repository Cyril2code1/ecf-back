<?php

$id = $_GET['id'];

$uuid = $_SESSION['uuid'];

Candidature::postuler($id, $uuid);


header('location:index.php?section=candidat');