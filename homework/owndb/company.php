<?php
/////////////// cafe 
require_once "connect.php";
try {
    $pdo = new PDO($attr, $username, $password, $opts);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}


$idQuery = "SELECT c_name FROM work";
$idResult = $pdo->query($idQuery);


if (isset($_POST["submit"])) {
    $c_name = sanitize($pdo, $_POST['c_name']);
    $c_city = sanitize($pdo, $_POST['c_city']);

    $sql = "INSERT INTO company (c_name, c_city) values ($c_name, $c_city)";

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
$query = "SELECT * FROM company";
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


    <div style="display: flex; margin: 30px; " ​>
        <div style="width: 30%; margin-right: 50px">
            <form action="company.php" method="post">
                <!-- selection -->
                <div class="input-group mb-3">
                    <label for="inputEmail4">Company Name</label><br>
                    <select name="c_name" class="form-control" id="inputEmail4">
                        <?php while ($row = $idResult->fetch()): ?>
                            <option value="<?= $row['c_name'] ?>"><?= $row['c_name'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div><br>

                <!-- Company City -->
                <div>
                    <label for="">Company City</label>
                    <input type="text" name="c_city" class="form-control">
                </div>

                <!-- button -->
                <div style="display: flex; margin-top: 0">
                    <button name="submit">Submit</button>
                    <!-- go to another page -->
                    <a href="hw5.php" style="font-size: 30px; margin-left: 30px;margin-top: 8px">Back</a>
                </div>



            </form>

        </div>
        <div>

            <!-- display  -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Company Name </th>
                        <th>Company City</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($display as $row) { ?>
                        <tr>
                            <!-- dak attr name bos table yg -->
                            <td><?= $row['c_name'] ?></td>
                            <td><?= $row['c_city'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>