<?php


if(isset($_POST["submit"])){
    $ice = $_POST['ice'];
    foreach($ice as $item) 
        echo "$item<br>";
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
</head>
<body>
    <div class="container">
        <form action="checkbox.php" method="post">

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


            <!-- ////////////// 

            <label for="">Gender</label><br>
            <input type="radio" name="male">Male<br>
            <input type="radio" name="female">Female<br>

-->
            <!-- button -->
            <button type="submit" name="submit" class="btn btn-primary" style="background-color: blue; margin-top: 15px">
                Submit
            </button>

        </form>
    </div>





</body>

</html>