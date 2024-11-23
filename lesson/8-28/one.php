<?php
require_once '../layout/header.php';
require_once 'connect.php';



try {
    $pdo = new PDO($attr, $username, $password, $opts);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


// $query = "CREATE TABLE users (
//         f_name VARCHAR(32) NOT NULL, 
//         l_name VARCHAR(32) NOT NULL,
//         username VARCHAR(32) NOT NULL,
//         password VARCHAR(255) NOT NULL
//     )";
// $result = $pdo->query($query);

if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['username']) && isset($_POST['password'])) {


    $f_name = sanitize($pdo, $_POST['firstName']);
    $l_name = sanitize($pdo, $_POST['lastName']);
    $username = sanitize($pdo, $_POST['username']);
    $password = sanitize($pdo, $_POST['password']);
    $hash = password_hash($password, PASSWORD_DEFAULT);
    add_user($pdo, $f_name, $l_name, $username, $hash);

    /* 
    //////here we can use insert into ... but $hash must be in ' '
    
    // $query = "insert into users (...) values (...)";
    // $result = pdo->query($query);

    // if ( $result){
    //     echo "User added";
    //     header ("Location: index.php");
    // } else {
    //     echo "Error adding user";
    // }

    */
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
<style>
    .navigator {
        width: 100%;
    }
    .main {
        width: 100%;
        display: flex;
        justify-content: flex-start;

    }

    .sidebar{
        width: 20%;
    }
    .content{
        width: 50%;
        padding-left: 20px;

    }
    .btn-primary{
        background-color: blue;
        margin-top: 10px;
    }
</style>

<body>
    <div class="navigator">
        <?php require_once '../layout/nav.php'; ?>

    </div>
    <div class="main">
        <div class="sidebar">

            <?php require_once '../layout/sidebar.php'; ?>
        </div>
        <div class="content">

            <?php require_once '../layout/content.php'; ?>
            <button name="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
    </div>
</body>