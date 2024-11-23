<?php
require_once 'connect.php';

try {
    $pdo = new PDO($attr, $username, $password, $opts);
} catch (\PDOException) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if (isset($_POST['login_username']) && isset($_POST['login_password'])) {

    $username = sanitize($pdo, $_POST['login_username']);
    $password = $_POST['login_password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('SELECT password FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // $status = "You're now logged in.<br>Welcome User: $username<br>";

    if ($user && password_verify(str_replace("'", "", $password), $hash)) {
        echo "<p style='color: green;'>  You're now logged in.<br>Welcome User: $username</p><br>";
        header("Location: profile.php", $username);
        //// we use header to link to another page after we success
        //// must use home.php
        //// cuz if we use index.php as a name, it will not go back even if we select another folder( still in index.php page)
        /// we must use another name instead of index.php

    } else {
        echo "<p style='color: red;'>Invalid Username/Password.</p>";
    }
}


function sanitize($pdo, $str)
{
    $str = htmlentities($str);
    return $pdo->quote($str);
}
