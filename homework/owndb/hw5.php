<?php
/////////////// cafe 
require_once "connect.php";
try {
    $pdo = new PDO($attr, $username, $password, $opts);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

if (isset($_POST["submit"])) {
    $e_id = sanitize($pdo, $_POST["e_id"]);
    $e_name = sanitize($pdo, $_POST['e_name']);
    $gender = sanitize($pdo, $_POST['gender']);
    $e_city = sanitize($pdo, $_POST['e_city']);

    $sql = "INSERT INTO employee (e_id, e_name, e_city, gender) values ( $e_id, $e_name, $e_city, $gender)";

    $result = $pdo->query($sql);
    if ($result) {
        echo "success";
    } else {
        echo "fail";
    }
}

function sanitize($pdo, $var)
{
    return $pdo->quote($var);
}

?>
<?php
$query = "SELECT * FROM employee";
$stmt = $pdo->prepare($query);
$stmt->execute();

$display = $stmt->fetchAll();
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
        button {
            background-color: blue;
            color: white;
            border: none;
            border-radius: 4px;
            margin-top: 10px;
            padding: 8px 8px;

        }

        div {
            margin: 15px;
        }
    </style>
</head>

<body>

    <div​ style="display: flex; align-items: center; margin: 30px; ">
        <div style="text-align: start; width: 30%; margin-left: 30px;margin-right: 50px; ">
            <form action="hw5.php" method="post">
                <!-- employee id -->
                <div>
                    <label for="">Employee ID</label><br>
                    <input type="text" name="e_id" class="form-control" j8i>
                </div>
                <!-- employee name -->
                <div>
                    <label for="">Employee Name</label><br>
                    <input type="text" name="e_name" class="form-control">
                </div>
                <!-- gender -->
                <div>
                    <label for="">Gender</label><br>
                    <input type="radio" name="gender" value="male">
                    <label for="">Male</label><br>
                    <input type="radio" name="gender" value="female">
                    <label for="">Female</label>
                </div>
                <!-- employee city -->
                <div>
                    <label for="">Employee City</label><br>
                    <input type="text" name="e_city" class="form-control">
                </div>
                <!-- button -->
                <div style="display: flex; margin-top: 0">
                     <button name="submit">Submit</button>
                     <a href="work.php" style="font-size: 30px; margin-left: 30px;margin-top: 8px">Go to Work</a>
                 </div>  

            </form>
        </div>
        <div>

            <!-- display  -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Employee ID </th>
                        <th>Employee Name</th>
                        <th>Gender</th>
                        <th>Employee City</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($display as $row) { ?>
                        <tr>
                            <!-- dak attr name bos table yg -->
                            <td><?= $row['e_id'] ?></td>
                            <td><?= $row['e_name'] ?></td>
                            <td><?= $row['gender'] ?></td>
                            <td><?= $row['e_city'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        </div>
</body>

</html>