<?php

require "src/config.php";

$conn = "mysql:host=". DB_HOST. ";dbname=" . DB_NAME .";charset=utf8";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

try {
    $db = new PDO($conn, DB_USER, DB_PASSWORD, $options);
    print_r($db);
} catch (Exception $e) {
    $error = $e->getMessage();
    echo $error;
}
