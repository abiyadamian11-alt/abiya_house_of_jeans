<?php

$DBname = "abiya_house_of_jeans";
$user = "root";
$host = "localhost";
$pass = "abia2005";
$dsn = "mysql:host=$host;dbname=$DBname;charset=utf8mb4";

$OPTIONS = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $OPTIONS);
} catch (\PDOException $e) {
    die("fail connection " . $e->getMessage());
}

?>
