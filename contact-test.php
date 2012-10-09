<?php

$to_email = "eplatt@doner.com";
$subject = "Question from Web Site.";
$from_email = "info@travaasa.com";
$question = 'Test question';
ini_set("sendmail_from", $from_email);

	
$headers =
    "From: info@travaasa.com\r\n"
    . "X-Mailer: php";
print mail($to_email,$subject,$question);
