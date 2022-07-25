<h2>Admin - créer un compte consultant</h2>

<?php

$tier = new Tiers();

echo($tier->tierSignup());

include_once INC.'signup_form.php';
