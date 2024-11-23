<?php

require_once "connect.php";

//// select table
/// execute a query that select all from classics table


try {
  $pdo = new PDO($attr, $username, $password, $opts);
  echo "List of Books<br><br>";

  $query = "SELECT * FROM classics";
  $result = $pdo->query($query);
  /// fetch each row from the result until there's no more row to fetch and display all 


  //// select table
  /// execute a query that select all from classics table
  $query = "SELECT * FROM classics";
  $result = $pdo->query($query);
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
          <th scope="col">Author</th>
          <th scope="col">Title</th>
          <th scope="col">Type</th>
          <th scope="col">Year</th>
          <th scope="col">ID</th>
          <th scope="col">Action</th>
        
          </tr>
        </thead>
_END;
  // while ($row = $result->fetch()) {
  //     echo 'Author: ' . htmlspecialchars($row['author']) . "<br>";
  //     echo 'Title: ' . htmlspecialchars($row['title']) . "<br>";
  //     echo 'Type: ' . htmlspecialchars($row['type']) . "<br>";
  //     echo 'Year: ' . htmlspecialchars($row['year']) . "<br>";
  //     echo 'ID: ' . htmlspecialchars($row['id']) . "<br><br>";
  // }
  while ($row = $result->fetch()) {

    $r1 = $row['author'];
    $r2 = $row['title'];
    $r3 = $row['type'];
    $r4 = $row['year'];
    $r5 = $row['id'];
    $r6 = '<button style="background-color: blue"><a  href= "update.php">Edit</a></button> 
          <button style= "background-color: red">Delete</button> ';

echo <<<_END

<tbody>
  <tr>
    
    <td>$r1</td>
    <td>$r2</td>
    <td>$r3</td>
    <td>$r4</td>
    <td>$r5</td>
    <td>$r6</td>
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

} catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}
