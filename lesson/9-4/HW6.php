<?php

//////////// register form 
require_once 'connect.php';
try {
    $pdo = new PDO($attr, $username, $password, $opts);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}




if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['username']) && isset($_POST['password'])) {


    $f_name = sanitize($pdo, $_POST['firstName']);
    $l_name = sanitize($pdo, $_POST['lastName']);
    $username = sanitize($pdo, $_POST['username']);
    $password = sanitize($pdo, $_POST['password']);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    add_user($pdo, $f_name, $l_name, $username, $hash);

//     $text = "Every sentence you speak has stressed and unstressed syllables";
// echo strlen($text);

}




function add_user($pdo, $fn, $ln, $un, $pw)
{
    $stmt = $pdo->prepare('INSERT INTO users VALUE (?, ?, ?, ?)');
    $stmt->bindParam(1, $fn, PDO::PARAM_STR, 32);
    $stmt->bindParam(2, $ln, PDO::PARAM_STR, 32);
    $stmt->bindParam(3, $un, PDO::PARAM_STR, 32);
    $stmt->bindParam(4, $pw, PDO::PARAM_STR, 255);
    $stmt->execute([$fn, $ln, $un, $pw]);
}

function sanitize($pdo, $var)
{
    return $pdo->quote($var);
}



?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        body {
            font-family: 'Arial';
            padding-top: 30px;
        }

        .first {
            margin: auto;
            width: 50%;
            border: solid 1px;
            padding: 15px;
            border-radius: 5px;

        }

        h2 {
            text-align: center;
        }

        .submit-button {
            background-color: blue;
            color: white;
            padding: 8px 8px;
            margin-top: 10px;
            border-radius: 5px;
            border: none;

        }

        label {
            font-weight: 400px;
        }
    </style>
</head>

<body>
    <div class="first">
        <form action="HW6.php" method="POST">
            <h2>
                Register Form
            </h2>
            <div>
                <label for="">First Name</label><br>
                <input type="text" name="firstName" class="form-control" j8i>
            </div>
            <div>
                <label for="">Last Name</label><br>
                <input type="text" name="lastName" class="form-control" j8i>
            </div>
            <div>
                <label for="">Username</label><br>
                <input type="text" name="username" class="form-control" j8i>
            </div>
            <div>
                <label for="">Passoword</label><br>
                <input type="password" name="password" class="form-control" j8i>
            </div>
            <div>
                <button name="submit" class="submit-button">
                    Submit
                </button>

                <label style="font-weight: 400; margin-left: 5px"> Already have account? <a href="login.php">Login</a></label>
            </div>

        </form>

    </div>
</body>

</html>