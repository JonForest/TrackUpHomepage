<?php

require_once ('../processquery.php');

$name = strip_tags(isset($_GET['nameInput']) ? $_GET['nameInput'] : '');
$email = strip_tags(isset($_GET['emailInput']) ? $_GET['emailInput'] : '');
$query = strip_tags(isset($_GET['queryText']) ? $_GET['queryText'] : '');

$emailer = new Emailer();
$location = $emailer->sendEmail($name, $email, $query);

header('index.html');
die();



