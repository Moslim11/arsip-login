<?php
$ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
	'secret' => '6Le9784pAAAAAMcmae_TYLfadjy37VY6rEmwgM4U',
	'response' => $_POST['g-recaptcha-response'],
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$result = json_decode($response);
return $result->success;
