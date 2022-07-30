<?php

$id = $_GET['id'];
$uuid = $_GET['uuid'];

$consultant = new Consultant;
$mailInfo = $consultant->prepareMail($id, $uuid);

$candidatLastname = $mailInfo[0]->lastname;
$candidatFirstname = $mailInfo[0]->firstname;


// function mail -> mail($to, $subject, $message, $header)
$boundary = md5(rand()); //needed to declare a separation between the message and the attachment (cf headers)

//$header

$headers = 'From: TRT-conseils'."\r\n";
$headers .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'."\r\n";
$headers .= 'MIME-Version: 1.0'."\r\n\r\n";

// $to
$to = htmlentities($mailInfo[0]->email);

// $subject
$subject = 'TRT-conseils: candidature';

//$attachment
$filename = './cv_pdf/'.$uuid.'.pdf';

$handle = fopen($filename, "r");
$content = fread($handle, filesize($filename));
$attachment = chunk_split(base64_encode($content));
fclose($handle);

//$message
$job = htmlentities($mailInfo[0]->job);
$desc = htmlentities($mailInfo[0]->description);

$message = "--$boundary \r\n";
$message .= "Content-Type: application/pdf; name=\"cv-$candidatLastname-$candidatFirstname.pdf\" \r\n";
$message .= "Content-Transfer-Encoding: base64 \r\n";
$message .= "Content-Disposition: attachment;\r\n\r\n";
$message .= $attachment;
$message .= "\r\n\r\n--$boundary \r\n";

$message .= "--$boundary \r\n";
$message .= "Content-Type: text/plain; charset=UTF-8; \r\n\r\n";
$message .= "Intitulé du poste: $job\r\n\r\n";
$message .= "Description du poste:\r\n $desc\r\n";
$message .= "\r\n Fichier joint: le cv du candidat au format pdf \r\n";
$message .= "--$boundary \r\n";

// send email and validate candidacy
if (mail($to, $subject, $message, $headers)) {
    
Consultant::validCandidacy($id, $uuid);

header('location:index.php?section=consultant&&action=pending_candidature');

} else {
    echo ('Echec lors de l\'envoi du mail');
}


