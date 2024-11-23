<!-- insert  -->
<?php
require_once 'connect.php';

try {
  $pdo = new PDO($attr, $username, $password, $opts);
} catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}

if (isset($_POST["submit"])) {
  $username = sanitize($pdo, $_POST['username']);
  $gender = sanitize($pdo, $_POST['gender']);
  $ice =  $_POST['ice']; //////// so here no need to sanitize                                    

  $icecream = implode(", ", $ice); /// convert from array to string
  ///// explode() -> string(like long text) to array

  $sql = "INSERT INTO icecream (name, gender, flavor) values ( $username, $gender, '$icecream')"; ///// 500error cuz queery insert or connect
  //// use ' ' with $icecream to insert it here . if not -> error

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
$query = "SELECT * FROM icecream";
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
    body {
      margin: 20px;
    }

    .container {
      margin-top: 20px;
    }
  </style>
</head>

<body>

  <div style="display: block;">


    <div class="container" style="display: block;">
      <form action="checkbox.php" method="post">
        <!-- radio -->
        <div class="form-check">
          <h4>Username</h4>
          <input type="text" name="username">
          <h4>Gender</h4>
          <input class="form-check-input" type="radio" name="gender" value="male">
          <label class="form-check-label" for="flexRadioDefault1">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" value="female">
          <label class="form-check-label" for="flexRadioDefault2">
            Female
          </label>
        </div>
        <h4>Flavor</h4>
        <div class="col-sm-10 offset-sm-2">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="ice[]" value="Vanilla">
            <label class="form-check-label" for="gridCheck1">
              Vanilla
            </label>
          </div>
        </div>

        <div class="col-sm-10 offset-sm-2">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="ice[]" value="Chocolate">
            <label class="form-check-label" for="gridCheck1">
              Chocolate
            </label>
          </div>
        </div>

        <div class="col-sm-10 offset-sm-2">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="ice[]" value="Strawberry">
            <label class="form-check-label" for="gridCheck1">
              Strawberry
            </label>
          </div>
        </div>




        <!-- button -->
        <button type="submit" name="submit" class="btn btn-primary" style="background-color: blue; margin-top: 15px">
          Submit
        </button>


        <div>
          <table class="table table-striped">
            <thead>
              <tr>
                <!-- <th>ID</th> -->
                <th>Name</th>
                <th>Gender</th>
                <th>Flavor</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($display as $row) { ?>
                <tr>
                  <!-- dak attr name bos table yg -->
                
                  <td><?= $row['name'] ?></td>
                  <td><?= $row['gender'] ?></td>
                  <td><?= $row['flavor'] ?></td>
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