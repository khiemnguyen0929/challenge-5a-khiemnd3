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

if ($_SESSION['type'] !== 'student') {
    $result->msg = 'Student is only authorized to take this action';
    die(json_encode($result));
}

if (isset($_POST)) {
    $data = json_decode(file_get_contents('php://input'), true);
    if(isset($data['answer']) && isset($data['id'])) {
        if(!in_array((int)$data['id'], $chall->getAllId())) {
            $result->msg = 'invalid id';
            die(json_encode($result));
        }
        $path = $chall->getFromId($data['id'])['url'];
        $filename = explode('.txt', array_slice(explode('/', $path), -1)[0])[0];
        if($data['answer'] === $filename) {
            $result->status = 1;
            $result->msg = file_get_contents(__DIR__.'/../..'.$path);
        }
    } else {
        $result->msg = 'invalid body';
    }
}

echo json_encode($result);