<?php
$host = "localhost";
$data = "classics";
$user = "root";
$pass = "";
$chrs = "utf8mb4";
$attr = "mysql:host=$host;dbname=$data;charset=$chrs";
$opts = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($attr, $user, $pass, $opts);
    echo "success....";
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}