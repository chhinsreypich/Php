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
            font-family: 'Arial';
            padding-top: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 50px;
        }

        .whole {
            width: 50%;
            margin: auto;
            border: solid 1px;
            padding: 15px;
            border-radius: 5px;
        }

        .submit-button {
            background-color: blue;
            color: white;
            padding: 8px 8px;
            margin-top: 10px;
            border-radius: 5px;
            border: none;

        }
    </style>
</head>

<body>
    <div class="whole">
        <form method="POST" action="login.php">
            <h2>
                Login Form
            </h2>
            <div>
                <label for="username">Usesrname</label><br>
                <input type="text" name="login_username" class="form-control">
            </div>
            <div>
                <label for="password">Passoword</label><br>
                <input type="password" name="login_password" class="form-control">
            </div>
            <div>
                <button name="submit" class="submit-button">Submit</button>
                <a style="font-weight: 400; margin-left: 5px" href="HW6.php">Back</a>
            </div>
        </form>
        <div style="font-weight: 400; margin-top: 15px;">

        <!--  -->
        <?php
        require_once 'loginphp.php';
        ?>
            <!-- <php
            require_once 'connect.php';

            try {
                $pdo = new PDO($attr, $username, $password, $opts);
            } catch (\PDOException) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }

            if (isset($_POST['login_username']) && isset($_POST['login_password'])) {
                $username = sanitize($pdo, $_POST['login_username']);
                $password = $_POST['login_password'];
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare('SELECT password FROM users WHERE username = ?');
                $stmt->execute([$username]);
                $user = $stmt->fetch();

                // $status = "You're now logged in.<br>Welcome User: $username<br>";

                if ($user && password_verify($password, $hash)) {
                    echo "<p style='color: green;'>  You're now logged in.<br>Welcome User: $username</p><br>";
                    header("Location: profile.php");
                    //// we use header to link to another page after we success
                    //// must use home.php
                    //// cuz if we use index.php as a name, it will not go back even if we select another folder( still in index.php page)
                    /// we must use another name instead of index.php
                    
                } else {
                    echo "<p style='color: red;'>Invalid Username/Password.</p>";
                }
            }


            function sanitize($pdo, $str)
            {
                $str = htmlentities($str);
                return $pdo->quote($str);
            }


            ?> -->
        </div>

    </div>

</body>


</html>










<!-- 
<php
require_once 'connect.php';

try {
    $pdo = new PDO($attr, $username, $password, $opts);
} catch (\PDOException) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if (isset($_POST['login_username']) && isset($_POST['login_password'])) {
    $username = sanitize($pdo, $_POST['login_username']);
    $password = $_POST['login_password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('SELECT password FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $hash)) {
        echo "You're now logged in. <br>";
        echo "Welcome User: " . $username . "<br>";
    } else {
        echo "Invalid Username/Password.";
    }
}


function sanitize($pdo, $str)
{
    $str = htmlentities($str);
    return $pdo->quote($str);
}


?> -->