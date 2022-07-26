<?php

$id = $_GET['id'];

$consultant = new Consultant();

$consultant->valid_insc($id);


header('location:index.php?section=consultant');
