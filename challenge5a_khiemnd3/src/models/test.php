<?php

require __DIR__.'/../databases/connection.php';

require 'Users.php';

$user = new Users($db);

//print_r($data);
print_r($user->getMessage('2'));