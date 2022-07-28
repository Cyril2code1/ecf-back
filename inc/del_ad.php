<?php

$id = $_GET['id'];

$ad = new Ad();

$ad->delAd($id);


header('location:index.php?section=recruteur');
