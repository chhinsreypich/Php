<?php
/////////////// cafe 
require_once "connect.php";
try {
    $pdo = new PDO($attr, $username, $password, $opts);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

if (isset($_POST["submit"])) {
    $username = sanitize($pdo, $_POST["username"]);
    $gender = sanitize($pdo, $_POST['gender']);
    $sugar = sanitize($pdo, $_POST['sugar']);
    $order = $_POST['order'];

    $allOrder = implode(", ", $order);


    $sql = "INSERT INTO coffee (name, gender, allOrder, sugar) values ( $username, $gender, '$allOrder', $sugar)";

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
$query = "SELECT * FROM coffee";
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
        label{
            font-size: 20px;
        }
        button {
            background-color: blue;
            color: white;
            border: none;
            border-radius: 4px;
            margin-top: 10px;
            padding: 8px 8px;

        }
    </style>
</head>

<body>

    <div​ style="display: flex; align-item: center; margin: 30px;">
        <div style="text-align: start;">
            <form action="hw5.php" method="post">
                <label for="">Username</label>
                <div>
                    <input type="text" name="username">
                </div>
                <label for="">Gender</label>
                <div>
                    <input type="radio" name="gender" value="male">
                    <label for="">Male</label>
                    <input type="radio" name="gender" value="female">
                    <label for="">Female</label>
                </div>
                <label for="">Sugar</label>

                <!-- No sugar -->
                <div>
                    <input type="radio" name="sugar" value="noSugar">
                    <label for="">No Sugar (0%)</label>
                </div>
                <!-- Half sugar -->
                <div>
                    <input type="radio" name="sugar" value="halfSugar">
                    <label for="">Half Sugar (50%)</label>
                </div>
                <!-- Less sugar -->
                <div>
                    <input type="radio" name="sugar" value="lessSugar">
                    <label for="">Less Sugar (75%)</label>
                </div>
                <!-- Normal sugar -->
                <div>
                    <input type="radio" name="sugar" value="normalSugar">
                    <label for="">Normal Sugar (100%)</label>
                </div>
                <!-- More sugar -->
                <div>
                    <input type="radio" name="sugar" value="moreSugar">
                    <label for="">More Sugar (150%)</label>
                </div>
                <!-- order -->
                <label for="">Order's List</label>
                <!-- Cappucinno -->
                <div>
                    <input type="checkbox" name="order[]" value="Cappucinno">
                    <label for="">Cappucinno</label>
                </div>

                <!-- Iced Latte -->
                <div>
                    <input type="checkbox" name="order[]" value="Iced Latte">
                    <label for="">Iced Latte</label>
                </div>

                <!-- Mocha Frape -->
                <div>
                    <input type="checkbox" name="order[]" value="Mocha Frape">
                    <label for="">Mocha Frape</label>
                </div>

                <!-- Iced Americano -->
                <div>
                    <input type="checkbox" name="order[]" value="Iced Americano">
                    <label for="">Iced Americano</label>
                </div>

                <!-- Green Tea -->
                <div>
                    <input type="checkbox" name="order[]" value="Green Tea">
                    <label for="">Green Tea</label>
                </div>

                <!-- Ice Lemon Tea -->
                <div>
                    <input type="checkbox" name="order[]" value="Ice Lemon Tea">
                    <label for="">Ice Lemon Tea</label>
                </div>

                <!-- Taro Bubble -->
                <div>
                    <input type="checkbox" name="order[]" value="Taro Bubble">
                    <label for="">Taro Bubble</label>
                </div>

                <!-- MilkTea -->
                <div>
                    <input type="checkbox" name="order[]" value="MilkTea">
                    <label for="">MilkTea</label>
                </div>

                <!-- Chocolate Frape -->
                <div>
                    <input type="checkbox" name="order[]" value="Chocolate Frape">
                    <label for="">Chocolate Frape</label>
                </div>





                <button name="submit">Submit</button>


                <!-- display  -->


                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Order</th>
                                <th>Sugar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($display as $row) { ?>
                                <tr>
                                    <!-- dak attr name bos table yg -->
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['gender'] ?></td>
                                    <td><?= $row['allOrder'] ?></td>
                                    <td><?= $row['sugar'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </form>

        </div>


        </div>






</body>

</html>