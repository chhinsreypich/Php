<!-- <
  require_once 'connect.php';
  // require_once 'select.php';

  try
  {
    $pdo = new PDO($attr, $username,$password, $opts);
    echo "Success..";
  }
  catch (PDOException $e) 
  {
    throw new PDOException($e->getMessage(), (int)$e->getCode()); 
  }

  /* display entire info in classics (query it)*/
  if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $query = "SELECT * FROM classics WHERE id=$id";
    $result = $pdo->query($query);
    $row = $result->fetch(PDO::FETCH_BOTH);
    //echo $row['author];
  }

  if(isset($_POST['update'])){
    $author = $_POST['author'];
    $title = $_POST['title'];
    $type = $_POST['type'];
    $year = $_POST['year'];
    $id = $_POST['id'];

    $query = "UPDATE classics SET author='$author', title='$title', type='$type', year='$year', id='$id' WHERE id='$id' ";
    $result = $pdo->query($query);
    header("location:7-17.php");
  }

  if(isset($_POST['cancel'])){
    header("location:7-17.php");
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
  <title>Edit</title>
  <style>
     *{
        padding: 10; 
        margin: 10;
        font-family: "Times New Roman', Times, serif";
        width : auto;
        height : auto;
      }
      input {
        width: 800px;
        
      }

      .container-fluid{
        display : flex;
        padding : 10px;
        flex-direction: row;
        margin-top : 10px;
        border : 1px solid black;
        justify-content : center;
      }
      h4{
        margin-left : 50px;
      }
    
  </style>
</head>
<body> 
  
  <h4>Create a Book</h4>
  <div class="container-fluid" style="margin : 10px; width : 50%;" >
    <div>
      <form class="row g-3" method="POST" action="7-17.php">
        <h1 style= "text-align: center;"> Update book </h1>
        <input type="hidden" name="id" value="">
        <div class="author-div" style="padding: 10px">
          <label for="inputEmail4" class="form-label">Author</label>
          <input type="text" name="author" class="form-control" id="inputEmail4" value="" placeholder="author">
        </div> 
        <div class="title-div" style="padding: 10px">
          <label for="inputPassword4" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" id="inputPassword4" value="" placeholder="title" >
        </div>
        <div class="type-div" style="padding: 10px">
          <label for="inputAddress" class="form-label">Type</label>
          <input type="text" name="type" class="form-control" id="inputAddress" value="" placeholder="type">
        </div>
        <div class="year-div" style="padding: 10px">
          <label for="inputAddress2" class="form-label">Year</label>
          <input type="text" name="year" class="form-control" id="inputAddress2" value="" placeholder="year" >
        </div>
        <div class="id-div" style="padding: 10px">
          <label for="inputCity" class="form-label">id</label>
          <input type="text" name="id" class="form-control" id="inputCity" value="" placeholder="id" >
        </div>
        
        <div class="col-12" style="padding-top: 10px">
          <button type="button" class="btn btn-primary">update</button>
          <button type="button" class="btn btn-danger">cancel</button>
        </div>
       
      </form>
    </div>
  </div>
</body>
</html> -->

