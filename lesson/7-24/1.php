<!-- midterm 5-9 august -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <title>Document</title>
    <style>
        .show {
            font-size: 20px;
            margin: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="1.php" method="post">
            <!-- What is your name? -->
             <!-- ****1
            <input type="text" name="username" class="form-control"> 
            -->

            <label style="font-size: 18px">Loan Amount</label>
            <input type="text" name="principle" class="form-control">

            <label style="font-size: 18px">Number of Years</label>
            <input type="text" name="year" class="form-control" value="5">

            <label style="font-size: 18px">Interest Rate</label>
            <input type="text" name="interest" class="form-control" value="3">

            <!-- button -->
            <button type="submit" name="submit" class="btn btn-primary" style="background-color: blue; margin-top: 15px">
                Submit
            </button>

        </form>
    </div>



    <!-- show  -->
    <div class="show">
        <!-- if you want to show add php here -->
        <?php
        /// ****1
        // if (isset($_POST['submit'])) {
        //     $user = $_POST['username'];
        //     echo "My name is " . $user;
        // }

        if (isset($_POST['submit'])) {
            $amount = $_POST['principle'];
            $numberOfYear = $_POST['year'];
            $interestRate = $_POST['interest'];
            $total = $amount * $numberOfYear;

            echo "In $numberOfYear Year: " . $total;
            echo "<br>";

            echo "In One Year: " . ($amount);
            echo "<br>";

            echo "In 1 Year: " . ($total * $interestRate) / 100;
            echo "<br>";

            echo "In 1 Month: " . ($total * ($interestRate / 100)) / 12;
        }



        ?>

    </div>







</body>

</html>