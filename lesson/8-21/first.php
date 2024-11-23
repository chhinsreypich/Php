<!-- 
    - 200 (like 500 in web page)  meaning the request succeeded
    - 404 meaning not found

*** postman page in browser (API) 

use cookie to store data for user until the cookie expired ( set date or period to store data until when .)
mostly 
domain name => ex: lifeun.edu.kh
edu => from ministry 
aws => amazon (free one year)
heroku => free for use 
DNS
127.0.0.1 => instead domain name yg nv localhost(localhost here mean our own system we use to develop it)

setcookie ( 'location', 'USA', time()+ 60 * 60* *24*7, '/');
---time()+ 60 * 60* *24*7 means save for 7 days
setcookie ( required name, required value, optional expired , path,.....)
----- required only name and value 

$_COOKIE is like $_POST (type) but different function 



-->



<?php
// we cannot add name and password as text here 
// use hash password 
// go to browser and search password
/// md5 use ah nis not safe like salt and hash password but we usually see md5 has been use more than those two ( not secure but better than plain text )
// salt password

/// oor we can use hash () function to convert plain text to hash password

$username = "admin";
$password = 'hihi';


if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
    if ($_SERVER['PHP_AUTH_USER'] === $username && $_SERVER['PHP_AUTH_PW'] === $password) {
        echo "You are now logged in";
    
    } else {
        die("Invalid username/password combination");
    }
} else {
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    die("Please enter your username and password");
}

?>