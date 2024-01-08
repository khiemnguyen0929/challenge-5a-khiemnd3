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

function signFile() {
    $time = hash('sha256', floor(microtime(true) * 1000));
    $result = substr($time, 0, 8) . '-';
    $result .= substr($time, 8, 4) . '-';
    $result .= substr($time, 12, 4) . '-';
    $result .= substr($time, 16, 4) . '-';
    $result .= substr($time, 17, 12);
    return $result;
}

if (!isset($_FILES['file'])) {
    $result->msg = 'invalid image';
    die(json_encode($result));
}

$file = $_FILES['file'];

if ($file['size'] > 5 * 1024 * 1024) {
    $result->msg = 'File size should not be larger than 5MB';
    die(json_encode($result));
}

$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

if ($ext !== 'jpg' && $ext !== 'png' && $ext !== 'jpeg') {
    $result->msg = $ext.' extension not allowed';
    die(json_encode($result));
}

$filename = signFile();

$path_upload = __DIR__.'/../../uploads/'.$filename.'.'.$ext;

if (move_uploaded_file($file["tmp_name"], $path_upload)) {
    $result->status = 1;
    $result->msg = 'Avatar has been changed';
    $uploaded = '/uploads/'.$filename.'.'.$ext;
    $result->url = $uploaded;
    $_SESSION['avt'] = $uploaded;
    $user->setAvatar($_SESSION['id'], $uploaded);
  } else {
    $result->msg = 'Sorry, there was an error uploading your file';
  }

echo json_encode($result);