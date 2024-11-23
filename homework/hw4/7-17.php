<?php
require_once 'connect.php';

try {
    $pdo = new PDO($dsn, $user, $pass, $attr);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['e_id']) && isset($_POST['e_name']) && isset($_POST['e_city'])) {
    $e_id = $_POST['e_id'];
    $e_name = $_POST['e_name'];
    $e_city = $_POST['e_city'];

    $query = "INSERT INTO employee (e_id, e_name, e_city) VALUES (:e_id, :e_name, :e_city)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':e_id', $e_id);
    $stmt->bindParam(':e_name', $e_name);
    $stmt->bindParam(':e_city', $e_city);

    try {
        $stmt->execute();
        echo "Success";
    } catch (PDOException $e) {
        die("Failed: " . $e->getMessage());
    }

    $fetchQuery = "SELECT * FROM employee";
    $fetchStmt = $pdo->prepare($fetchQuery);
    $fetchStmt->execute();
    $results = $fetchStmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        * {
            font-family: Open sans;
        }
        .create-div{color: black;}

        .big-div {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 60%;
            margin: 10% 20%;

        }

        .whole {
            border-radius: 5px;
            /* background-color: rgb(187, 180, 247); */
            border: none;
            padding-top: 20px;
        }

        .form-div {
            margin-left: 20%;
            width: 60%;

        }

        h4 {
            text-align: center;
            color: black;
        }

        .create-div {
            display: flex;
            justify-content: center;
            /* color: green; */
            font-size: 40px;
            font-weight: bold;
            margin-top: 50px;
        }

        #button {
            display: flex;
            justify-content: center;
        }

        .submit-btn {
            border: none;
            border-radius: 8px;
            background-color: blue;
            color: white;
            padding: 10px 15px;
        }
    </style>
</head>

<body>
    <div class="big-div">



        <h4 class="create-div">Create a EmploKOyee</h4>
         <!-- <p style="font-size: 40px;">Create Employee</p> -->
        <div class="whole" id="big-div">
            <div>
                <form class="row g-3 form-div" method="POST" action="7-17.php">
                    <div class="col-12" style="padding: 10px">
                        <label  style="font-size: 18px;">Employee  ID</label>
                        <input type="text" name="e_id" class="form-control" placeholder="id">
                    </div>
                    <div class="col-12" style="padding: 10px">
                        <label style="font-size: 18px;">Employee  Name</label>
                        <input type="text" name="e_name" class="form-control" placeholder="e_name">
                    </div>
                    <div class="col-12" style="padding: 10px">
                        <label style="font-size: 18px;">Employee  City</label>
                        <input type="text" name="e_city" class="form-control" placeholder="e_city">

                        <div style="margin-top: 60px;"></div>
                        <div id="button" class="col-12">
                            <button type="submit" class="submit-btn">Submit</button>
                        </div>
                </form>

                <?php if (isset($results) && count($results) > 0) : ?>
                    <table class="table table-striped" style="margin-top: 20px;">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Employee City</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($results as $row) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['e_id']) ?></td>
                                    <td><?= htmlspecialchars($row['e_name']) ?></td>
                                    <td><?= htmlspecialchars($row['e_city']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>

            </div>
        </div>
    </div>
</body>

</html>



<!-- insert 

< php
require_once 'connect.php';

try {
    $pdo = new PDO($dsn, $username, $password, $attr);
    echo "Database connection successful<br>";
} 
catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

function sanitize($var) {
    return trim(strip_tags($var));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['e_id']) && isset($_POST['e_name']) && isset($_POST['e_city'])) {
    $e_id = sanitize($_POST['e_id']);
    $e_name = sanitize($_POST['e_name']);
    $e_city = sanitize($_POST['e_city']);

    $stmt = $pdo->prepare("INSERT INTO employee (e_id, e_name, e_city) VALUES (:e_id, :e_name, :e_city)");
    $stmt->bindParam(':e_id', $e_id);
    $stmt->bindParam(':e_name', $e_name);
    $stmt->bindParam(':e_city', $e_city);
    $stmt->execute();
    echo "New employee record created successfully.<br>";
} else {
    echo "Error: Invalid input";
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
                <div class="col-md-6" style="padding: 10px">
                    <label for="inputEmail4" class="form-label">Employee ID</label>
                    <input type="number" min='1' max='100' name="e_id" class="form-control" id="inputEmail4" placeholder="employee id">
                </div>
                <div class="col-12" style="padding: 10px">
                    <label for="inputPassword4" class="form-label">Employee Name</label>
                    <input type="text" name="e_name" class="form-control" id="inputPassword4" placeholder="employee name">
                </div>
                <div class="col-12" style="padding: 10px">
                    <label for="inputAddress" class="form-label">Employee City</label>
                    <input type="text" name="e_city" class="form-control" id="inputAddress" placeholder="employee city">
                </div>
                <div class="col-12" style="padding: 10px">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>

 -->
















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