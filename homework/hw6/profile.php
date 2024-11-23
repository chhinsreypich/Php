<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .pf{
            width: 70px;
            border-radius: 50%;
            
        }
    </style>
</head>
<body>
    <p>this is index pages</p>
    <h3>
        My Profile

    </h3>
    <img class="pf" src="../profile.jpg" alt="">
    <?php 
        require_once "loginphp.php";
        echo "<p style='color: green;'>  You're now logged in.<br>Welcome User: $username</p><br>";

    ?>
</body>
</html>
<!-- session store user info in variable -->
<!-- cookie store user info in browser -->