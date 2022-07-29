<?php

$id = $_GET['id'];

$consultant = new Consultant();

$consultant->validAd($id);


header('location:index.php?section=consultant&&action=pending_ads');