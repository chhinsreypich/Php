<?php // login.php
$host = 'localhost'; 
$data = 'php2024'; 
$user = 'root'; 
$pass = ''; 
$chrs = 'utf8mb4';
$attr = "mysql:host=$host;dbname=$data;charset=$chrs";
$opts =
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];


try {
    $pdo = new PDO($attr, $user, $pass, $opts);
    echo "Success....<br><br>";
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}


//// select table
/// execute a query that select all from classics table
$query = "SELECT * FROM classics";
$result = $pdo->query($query);
/// fetch each row from the result until there's no more row to fetch and display all 
while ($row = $result->fetch()) {
    echo 'Author: ' . htmlspecialchars($row['author']) . "<br>";
    echo 'Title: ' . htmlspecialchars($row['title']) . "<br>";
    echo 'Type: ' . htmlspecialchars($row['type']) . "<br>";
    echo 'Year: ' . htmlspecialchars($row['year']) . "<br>";
    echo 'ID: ' . htmlspecialchars($row['id']) . "<br><br>";
}
