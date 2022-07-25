<h2>signup</h2>

<?php
$tier = new Tiers();
echo ($tier -> tierSignUp());

include_once INC."signup_form.php";