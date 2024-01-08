<?php

require __DIR__.'/../databases/connection.php';
require __DIR__.'/../models/Challenges.php';

header('Content-Type: application/json');

$chall = new Challenges($db);
$result = new stdClass;
$result->status = 0;

if(!isset($_SESSION['is_login']) || $_SESSION['is_login'] != true) {
    $result->msg = 'You are not logged in';
    die(json_encode($result));
}

$data = $chall->getAll();
$result->data = [];

foreach($data as $v) {
    array_push($result->data, [
        'id' => $v['id'],
        'title' => $v['title'],
        'hint' => $v['description'],
    ]);
}

$result->status = 1;
echo json_encode($result);