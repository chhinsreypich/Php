<?php
require_once 'connect.php';

try {
    $pdo = new PDO($dsn, $user, $pass, $attr);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$query = "SELECT * FROM employee";
$stmt = $pdo->prepare($query);
$stmt->execute();

$results = $stmt->fetchAll();

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

     .container{
        padding : 10px;
        padding-top : 30px;
        padding-bottom : 30px;

        margin-top : 10px;
        margin-left : 30px;
        margin-right: 50px;
        border : 1px solid black;
        display : flex;
        justify-content : center;
      }
      h4{
        margin-left : 50px;
        color: black;
      } 
     .topic{
        display : flex;
        justify-content : center;
        color : green;
        font-size : 40px;
        font-weight : bold;
        margin-top : 50px;
      }
      #button{
        display : flex;
        justify-content : center;
      }

  </style>
</head>
<body>
  
  <h4 class= "topic">Display Employee</h4>
  <div class="container" id = "big-div">
    <div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Employee Name</th>
            <th>Last Name</th>
            <th>Phone Number</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($results as $row) { ?>
          <tr>
            <td><?= $row['e_id'] ?></td>
            <td><?= $row['e_name'] ?></td>
            <td><?= $row['e_city'] ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>







<!-- <php 
  require_once 'connect.php';

  try
  {
    $pdo = new PDO($attr, $username, $password, $opts);
    /* NOTE : $attr MUST GO FIRST  because it has to connect to db and server */
    
    $query = "SELECT * FROM employee";
    $result = $pdo->query($query);

    //echo "<table><tr><th>Author</th><th>Title</th><th>type</th><th>year</th><th>ISBN</th></tr>";

    echo <<<_END
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <title>Document</title>
    </head>
    <style>
          .table-rate{
            padding-left : 10px;
            padding-top : 10px;
            padding-bottom : 100px;
            margin-top : 20px;
            margin-left : 10px;
            margin-right: 50px;
            border : 1px solid black;
            display : flex;
            flex-direction: column;
            justify-content : start;
            border-radius: 25px;
            background:#a2a2b5;
            width: 600px;
            height: 400px;
          }
        </style>

      <body>
        <div class="table-rate"> 
        <p> Lists of the Book table : </p>
        <table class="table table-striped table-dark">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Employee Id</th>
              <th scope="col">Employee Name</th>
              <th scope="col">Employee City</th>
            </tr>
          </thead>
_END;

    while ( $row = $result->fetch()){
    
      $r0 = $row['e_id'];
      $r1 = $row['e_name'];
      $r2 = $row['e_city'];
     
      // echo "</tbody>";
      echo <<<_END

          <tbody>
            <tr>
              <td>$r0</td>
              <td>$r1</td>
              <td>$r2</td>
              
              <td>
                <a class="btn btn-info" href='update.php?edit=$r0'>edit</a> 
              </td>
            </tr>
            </tr>
          </tbody>
      
_END;

    }
    echo <<<_END
      </table>
        </div>
      </body>
    </html>
_END;

}
catch (PDOException $e) 
{
  throw new PDOException($e->getMessage(), (int)$e->getCode()); 
}

  // }
?> -->






<!-- 





<  php
require_once "connect.php";



try {
  $pdo = new PDO($dsn, $username, $password, $attr);
  echo "List of Books<br><br>";

} catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}
  $query = "SELECT * FROM employee";
  $result = $pdo->query($query);
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
    th,
    td {
      border-style: none;
    }

    button {
      padding: 8px 12px;
      border: 1px solid;
      color: white;
      border: none;
      border-radius: 4px;
    }

    a {
      color: white;
    }
  </style>
</head>

<body>
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Employee ID</th>
        <th scope="col">Employee Name</th>
        <th scope="col">Employee City</th>
        <th scope="col">Action</th>
      </tr>
    </thead>


    <tbody>
      <?php foreach ($result as $row) { ?>
        <tr>
          <td><?= $row['e_id'] ?></td>
          <td><?= $row['e_name'] ?></td>
          <td><?= $row['e_city'] ?></td>
        </tr>
      <?php } ?>
    </tbody>




  </table>
</body>

</html>
 -->

<!-- 

< php

////// show button to show the company name

require_once "connect.php";

//// select table
/// execute a query that select all from classics table
 

try {
  $pdo = new PDO($attr, $username, $password, $opts);
  echo "List of Books<br><br>";

  $query = "SELECT * FROM employee";
  $result = $pdo->query($query);
  /// fetch each row from the result until there's no more row to fetch and display all 


  //// select table
  /// execute a query that select all from classics table
  // $query = "SELECT * FROM employee";
  // $result = $pdo->query($query);
  /// fetch each row from the result until there's no more row to fetch and display all 

  echo <<<_END
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
        th, td {
            border-style: none;
        }
        button{
          padding: 8px 12px; 
          border: 1px solid ; 
          color: white; 
          border: none; 
          border-radius: 4px;
        }
        a {
          color: white;
        }

      </style> 
    </head>
    <body>
      <table class="table table-bordered">
        <thead class="thead-dark" >
          <tr>
          <th scope="col">Employee ID</th>
          <th scope="col">Employee Name</th>
          <th scope="col">Employee City</th>
          <th scope="col">Action</th>
        
          </tr>
        </thead>
_END;
  while ($row=$result->fetch()) {

    $r1 = $row['e_id'];
    $r2 = $row['e_name'];
    $r3 = $row['e_city'];
    // $r4 = $row['year'];
    // $r5 = $row['id'];
    // $r6 = '<button style="background-color: blue"><a  href= "update.php">Edit</a></button> 
    //       <button style= "background-color: red">Delete</button> ';

echo <<<_END

<tbody>
  <tr>
    
    <td>$r1</td>
    <td>$r2</td>
    <td>$r3</td>
    <td> 
      <a class= "btn btn-info" href= "update.php?edit = $r1"> edit</a>
      // <a class= "btn btn-danger" href= "delete.php?edit = $r1"> edit</a>
      
    </td>
  </tr>
  </tr>
</tbody>      

_END;
  }
  echo <<<_END
  </table>

  </body>
  </html>
_END;

}
catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}
?> -->