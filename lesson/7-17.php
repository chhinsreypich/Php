<!-- insert  -->


<?php
require_once 'connect.php';

try {
    $pdo = new PDO($attr, $username, $password, $opts);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

//check if in our input field we have entered or input anything or not? 
//if it does, it will show what we have put


/* _GET : NOT SECURE, $_POST: SECURE */
if (isset($_POST['author']) && isset($_POST['title']) && isset($_POST['type']) && isset($_POST['year']) && isset($_POST['id'])) {
    //author or .. ng yok mor pi name ah krom ng 
    //teanh mok pi input name ng 
    // 
    // $author = $_POST['author'];
    // $title = $_POST['title'];
    // $type = $_POST['type'];
    // $year = $_POST['year'];
    // $isbn= $_POST['isbn'];

    $author = sanitize($pdo, $_POST['author']);
    $title = sanitize($pdo, $_POST['title']);
    $type = sanitize($pdo, $_POST['type']);
    $year = sanitize($pdo, $_POST['year']);
    $id = sanitize($pdo, $_POST['id']);

    $query = "INSERT INTO classics (author, title, type, year, id) VALUES($author, $title, $type, $year, $id)";
    // var_dump($query);
    $pdo->exec($query); //exe : execute
    echo "Success..";
}

$query = "SELECT * FROM classics";
$result = $pdo->query($query);


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
        .container-fluid {
            border: solid;
            width: 60%;
            display: flex;
            justify-content: center;
            border-radius: 5px;
            border-width: 1px;
            border-color: grey;
            margin: 10% 20%;
            padding-top: 20px;
        }
    </style>
</head>

<body>

    <h4>Create a Book</h4>
    <div class="container-fluid">
        <div>
            <form class="row g-3" method="POST" action="7.17.php">
                <div class="author-div" style="padding: 10px">
                    <label for="inputEmail4" class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" id="inputEmail4" placeholder="author">
                </div>
                <div class="title-div" style="padding: 10px">
                    <label for="inputPassword4" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="inputPassword4" placeholder="title">
                </div>
                <div class="type-div" style="padding: 10px">
                    <label for="inputAddress" class="form-label">Type</label>
                    <input type="text" name="type" class="form-control" id="inputAddress" placeholder="type">
                </div>
                <div class="year-div" style="padding: 10px">
                    <label for="inputAddress2" class="form-label">Year</label>
                    <input type="text" name="year" class="form-control" id="inputAddress2" placeholder="year">
                </div>
                <div class="id-div" style="padding: 10px">
                    <label for="inputCity" class="form-label">ID</label>
                    <input type="text" name="id" class="form-control" id="inputCity" placeholder="id">
                </div>

                <div class="col-12" style="padding: 10px">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>


<?php
require_once 'select.php';

?>






 











<!-- 






//// dark php <> ey ng nv nis // login.php

require_once 'connect.php';

try {
    $pdo = new PDO($attr, $username, $password, $opts);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

//check if in our input field we have entered or input anything or not? 
//if it does, it will show what we have put


/* _GET : NOT SECURE, $_POST: SECURE */
if (isset($_POST['author']) && isset($_POST['title']) && isset($_POST['type']) && isset($_POST['year']) && isset($_POST['id'])) {
    //author or .. ng yok mor pi name ah krom ng 
    //teanh mok pi input name ng 
    // 
    // $author = $_POST['author'];
    // $title = $_POST['title'];
    // $type = $_POST['type'];
    // $year = $_POST['year'];
    // $isbn= $_POST['isbn'];

    $author = sanitize($pdo, $_POST['author']);
    $title = sanitize($pdo, $_POST['title']);
    $type = sanitize($pdo, $_POST['type']);
    $year = sanitize($pdo, $_POST['year']);
    $id = sanitize($pdo, $_POST['id']);

    $query = "INSERT INTO classics (author, title, type, year, id) VALUES($author, $title, $type, $year, $id)";
    // var_dump($query);
    // $pdo->exec($query); //exe : execute
    echo "Success..";
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
        .container-fluid {
            border: solid;
            width: 60%;
            display: flex;
            justify-content: center;
            border-radius: 5px;
            border-width: 1px;
            border-color: grey;
            margin: 10% 20%;
            padding-top: 20px;
        }
    </style>
</head>

<body>

    <h4>Create a Book</h4>
    <div class="container-fluid">
        <div>
            <form class="row g-3" method="POST" action="7-17.php">
                <div class="col-md-6" style="padding: 10px">
                    <label for="inputEmail4" class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" id="inputEmail4" placeholder="Author">
                </div>
                <div class="col-md-6" style="padding: 10px">
                    <label for="inputPassword4" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="inputPassword4" placeholder="Title">
                </div>
                <div class="col-12" style="padding: 10px">
                    <label for="inputAddress" class="form-label">Type</label>
                    <input type="text" name="type" class="form-control" id="inputAddress" placeholder="Type">
                </div>
                <div class="col-12" style="padding: 10px">
                    <label for="inputAddress2" class="form-label">Year</label>
                    <input type="text" name="year" class="form-control" id="inputAddress2" placeholder="Year">
                </div>
                <div class="col-md-6" style="padding: 10px">
                    <label for="inputCity" class="form-label">ISBN</label>
                    <input type="text" name="id" class="form-control" id="inputCity" placeholder="ID">
                </div>

                <div class="col-12" style="padding: 10px">
                    <button type="submit" class="btn btn-primary" border: none;>Submit</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>

//// dark php nv nis toooo
require_once "display.php";


?> -->