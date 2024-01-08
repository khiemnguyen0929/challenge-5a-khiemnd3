<?php

require __DIR__.'/../databases/connection.php';
require __DIR__.'/../models/Users.php';

header('Content-Type: application/json');

$user = new Users($db);
$result = new stdClass;
$result->status = 0;

if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] != true) {
    $result->msg = 'You are not logged in';
    die(json_encode($result));
}

$result->msg = $user->getMessage($_SESSION['id']);
$result->status = 1;

echo json_encode($result);