<?php

$id = $_GET['id'];

$recruteur = new Recruteur();

$recruteur->delAd($id);


header('location:index.php?section=recruteur');
