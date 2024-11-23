<?php
$host = "localhost";
$db = "relation"; // Changed database name to ID_CARD without space
$user = "root";
$pass = "";
$chrs = "utf8mb4";

$attr = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$dsn = "mysql:host=$host;dbname=$db;charset=$chrs"; // Removed space after semicolon
?>


<!-- <  php

$host = 'localhost';
$db = 'relation'; 
$username = 'root';
$password = '';
$chrs = 'utf8mb4';


$attr = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
];

$dsn = "mysql:host=$host;dbname=$db;charset=$chrs"; // 
// $attr = "mysql:host=$host;dbname=$db;charset=$chrs"; 
 
// $opts = 
// [
//   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
//   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
//   PDO::ATTR_EMULATE_PREPARES => false,
// ]; 

?>  -->