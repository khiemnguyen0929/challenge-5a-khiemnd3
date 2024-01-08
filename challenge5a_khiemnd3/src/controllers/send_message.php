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

if ($_SESSION['type'] !== 'admin') {
    $result->msg = 'Admin is only authorized to take this action';
    die(json_encode($result));
}

if (isset($_POST)) {
    $data = json_decode(file_get_contents('php://input'), true);
    if(isset($data['message']) && isset($data['id'])) {
        if(!in_array((int)$data['id'], $user->getAllId())) {
            $result->msg = 'invalid id';
            die(json_encode($result));
        }
        if($user->sendMessage($data['id'], $data['message'])) {
            $result->status = 1;
        } else {
            $result->msg = 'Message has not been sent';
        }
    } else {
        $result->msg = 'invalid body';
    }
}

echo json_encode($result);