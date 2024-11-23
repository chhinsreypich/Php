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

    
    $stmt->execute(['f_name']);
    $fn = $stmt->fetch();
    $stmt->execute(['l_name']);
    $ln = $stmt->fetch();


    // $query = "SELECT * FROM users WHERE username=$username";
    // $result = $pdo->query($query);
    // // // if (!$result->rowCount()) die("User not found");
    // $row = $result->fetch();
    // $fn = $row['f_name'];
    // $ln = $row['l_name'];
    // $un = $row['username'];
    // $pw = $row['password'];



    if ($user && password_verify(str_replace("'", "", $password), $hash)) {
        session_start();
        $_SESSION['f_name'] = $fn;
        $_SESSION['l_name'] = $ln;
        echo "<p style='color: green;'>  You're now logged in.<br>Welcome User: $username</p><br>";
        // header("Location: profile.php", $username);
        die("<p><a href='continue.php'>Click here to continue</a></p>");
    } else {
        echo "<p style='color: red;'>Invalid Username/Password.</p>";
    }
}


function sanitize($pdo, $str)
{
    $str = htmlentities($str);
    return $pdo->quote($str);
}
