<?php
session_start();
if (isset($_SESSION['f_name'])) {
    $fn = $_SESSION['f_name'];
    $ln = $_SESSION['l_name'];
    destroy_session_and_data();
    echo htmlspecialchars("Welcome back $fn");
    echo "<br>";
    echo ("Your full name is $fn $ln.");
} else echo "Please <a href='login.php'>click here</a> to log in.";
function destroy_session_and_data()
{
    $_SESSION = array();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
}

