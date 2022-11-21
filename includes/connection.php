<?php

// VOOR DEVELOPMENT
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "crudusers";

try {
    $dsn = "mysql:host=" . $dbServername . ";dbname=" . $dbName;
    $pdo = new PDO($dsn, $dbUsername, $dbPassword);
} catch (PDOException $e) {
    echo "DB Connection Failed: " . $e->getMessage();
}
