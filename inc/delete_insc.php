<?php

$id = $_GET['id'];

$consultant = new Consultant();

$consultant->delete_insc($id);


header('location:index.php?section=consultant');
