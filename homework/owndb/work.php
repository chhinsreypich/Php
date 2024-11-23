<?php
/////////////// cafe 
require_once "connect.php";
try {
    $pdo = new PDO($attr, $username, $password, $opts);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}


$idQuery = "SELECT e_id FROM employee";
$idResult = $pdo->query($idQuery);


if (isset($_POST["submit"])) {
    $e_id = sanitize($pdo, $_POST['e_id']);
    $c_name = sanitize($pdo, $_POST['c_name']);
    $salary = sanitize($pdo, $_POST['salary']);

    $sql = "INSERT INTO work (ID, c_name, salary) values ($e_id, $c_name, $salary)";

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
$query = "SELECT * FROM work";
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


    <div​ style="display: flex; align-items: center; margin: 30px;">
        <div style="text-align: start; width: 30%; margin-right: 50px">
            <form action="work.php" method="post">
                <!-- selection -->
                <!-- <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Employee ID</label>
                    <select name="e_id" class="form-select" id="inputGroupSelect01">
                        <php while ($row = $idResult->fetch()): ?>
                            <option value="<?= $row['e_id'] ?>"><?= $row['e_id'] ?></option>
                        ?php endwhile; ?>
                    </select>
                </div> -->

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Employee ID</label>
                    <select name="e_id"  class="form-control" id="inputEmail4">
                        <?php while ($row = $idResult->fetch()): ?>
                            <option value="<?= $row['e_id'] ?>"><?= $row['e_id'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <!-- company name -->
                <div>
                    <label for="">Company Name</label>
                    <input type="text" name="c_name" class="form-control" id="inputPassword">
                </div>
                <!-- Salary -->
                <div>
                    <label for="">Salary</label>
                    <input type="text" name="salary" class="form-control" id="inputPassword">
                </div>
                
                <!-- button -->
                 <div style="display: flex;   margin-top: 0">
                     <button name="submit">Submit</button>
                     <a href="company.php" style="font-size: 30px; margin-left: 30px;margin-top: 8px">Go to Company</a>
                 </div>     



            </form>
        </div>
        <div>
            <!-- go to another page -->

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
                            <td><?= $row['ID'] ?></td>
                            <td><?= $row['c_name'] ?></td>
                            <td><?= $row['salary'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
</body>

</html>