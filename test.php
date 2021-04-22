<?php

use App\User\User;

require __DIR__ . "/vendor/autoload.php";

$user = new User();

$l = $user->getUsers();

print_r($l);