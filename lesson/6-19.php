<!-- 
    review
-->


<!--  
// 2 dimension array
// $students = array(
//     array("John", "Jane", "Jim"),
//     array("apple", "banana", "orange"),
//     array("red", "blue", "yellow")
// );

// //  echo $students[1][2];

//////////////// function 

// echo phpversion();

// echo phpinfo();
// // in http header information 
// // line http request
// // GET /Php/lesson/19-6.php HTTP/1.1
// // if "get" is "post", we can post something with this php
// // if get, we cannot

//  --->



<?php
//include "library.php";
//// we include file like 'this
/// but we can use 
// requires_once "library.php";
// use require_once is better than include
// if has any error, it will tell us

function full_name($full_name, $last_name)
{
    $full_name = strtolower($full_name);
    $last_name = strtolower($last_name);

    return  $full_name . " " . $last_name;
}
echo full_name("John", "Doe");
echo "<br>";

$name = "sokhom";
echo strtoupper($name);
echo "<br>";
echo strtolower($name);
echo "<br>";

$u = "Hello world!";
echo substr($u, 6, 6);
echo "<br>";

echo ucfirst(strtolower($name));
/// ucfirst convert first char of string to uppercase. and the rise of them afre lower case 


///   &$one
/// & call reference
echo "<br>";

/////////////// try variable name
/// the comment are the incorrect
// $$ji = 1;
$_ji = 1; /// ok
$_ji1 = 1; /// ok
$_ji_1 = 1; /// ok
$ji1 = 1; /// ok
echo "try the variable name " . $_ji_1;
echo "<br>";

$fname = "BophA";
$lname = "phonE";

function full_name_change(&$fname, &$lname)
{
    echo "uxfirst....";
    $fname = ucfirst(strtolower($fname));
    $lname = strtolower($lname);
    echo "<br>";
    /// no return here but the parameter has to have address
}

echo "<br>";
echo $fname . " " . $lname;

echo "<br>";
full_name_change($fname, $lname);
echo $fname . " " . $lname;
echo "<br>";


////// global keyword

/// if we want to know is function exist or not we use
/// we can use file_exists
// if (file_exists("arraytext.txt")) { ... }

if (function_exists("array_combine")) {
    echo "Function exist<br>";
} else {
    echo "Function not Exists. Better write your own.<br>";
}



/// class is template of object
class Car
{
    var $color;
    function Car($color = "green")
    {
        $this->color = $color;
    }
    function what_color()
    {
        return $this->color;
    }
}

$herbie = new Car("red");
echo $herbie->what_color();

class User
{
    public $username, $password; /// properties

    function save_user()
    { /// method
        echo "Save user<br>";
    }
    function get_password()
    {
        return $this->password;
    }
}

$user = new User;
// echo $user; /// not yet declare anything then it is error
print_r($user); /// not error but Output: User Object ( [username] => [password] => ) Pich
$user->username = "Pich";
$user->password = 58586;
echo $user->username;
echo "<br>";
echo $user->password;
echo "<br>";
echo $user->get_password();
echo "<br>";
$user->save_user();

/// clone keyword
/// $this keyword

//// global keyword
$a1 = "WILLIAM";
$a2 = "henry";
$a3 = "gatES";
echo $a1 . " " . $a2 . " " . $a3 . "<br>";
fix_names();
echo $a1 . " " . $a2 . " " . $a3;
function fix_names()
{
    global $a1;
    $a1 = ucfirst(strtolower($a1));
    global $a2;
    $a2 = ucfirst(strtolower($a2));
    global $a3;
    $a3 = ucfirst(strtolower($a3));
}
echo "<br>";

///// clone keyword

$object1 = new TheUser();
$object1->name = "Alice";
$object2 = clone $object1;//// with clone => alice, amy
/// without clone => amy, amy
$object2->name = "Amy";
echo "object1 name = " . $object1->name . "<br>";
echo "object2 name = " . $object2->name;
class TheUser
{
public $name;
}
















?>