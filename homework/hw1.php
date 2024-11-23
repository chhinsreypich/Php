<?php

/* ECHO */

/// print hello world wtih php
/// start with < echo + "....." + ;
echo "Hello, World!";
/// <br> for new line
echo "<br><br>";

// this is one line comment 
/* 
    
        this 
        is multi 
        line 
        comment 
    
    */
/// we use comment to describes what it do, hide an error code....



/* VARIABLE */

/// basis syntax
// $ symbol use in front all variables.
$x = 5;
$y = 34.4;
/// no need to tell the computer what type is this variable
/// it knows itself
// assign value (5) to variable ($x)
$myString = "This is String.";
// assign string value to variable ($myString)
echo "$x   $y   $myString";
echo "<br>";
// print value of $x and $myString
// or we can print the same thing using . 
echo $x . "  " . $y . "  " . $myString;
echo "<br><br>";


/// we can assign variable to variable

$name = "Jane";
$user_name = $name;
echo $user_name;
echo "<br><br>";


/// array 
$myArray = array("apple", "banana", "orange");
// assign array value to variable ($myArray)
// echo $myArray;
echo $myArray[0];
echo "<br><br>";

/// to print all array using for loop
for ($i = 0; $i < 3; $i++) {
    echo $myArray[$i];
    echo "<br>";
}

echo "<br>";

/// we can also use for each loop to print array
foreach ($myArray as $i) {
    echo $i;
    echo "<br>";
}

echo "<br><br>";

//// associative array
// associative array are array that use named key that u assign to them
$myArray2 = array(
    "name" => "Jane",
    "age" => 25,
    "salary" => 4000
);
// assign associative array value to variable ($myArray2)
echo $myArray2["name"];

echo "<br>";
// change value
$myArray2["name"] = "John";
echo $myArray2["name"];
echo "<br><br>";

/// we cannot use for loop to print all associative array 
/// we can only use for each loop
foreach ($myArray2 as $key => $value) {
    echo $key . " : " . $value;
    echo "<br>";
}

echo "<br><br>";


/// we can calculate variables in echo 
$num1 = 5;
$num2 = 10;
echo $num1 + $num2;
echo "<br><br>";


/* OPERATORS */
// arithmetic:  +, -, *, /, %, ++, --, **, 
// assignment: +=, -= ...
$count = 5;
$count = $count + 1;
$count += 1;
$count++;

// comparison: ==, !=, >, <, >=, <=, ===, !== 

// logical: &&, ||, !


//// php sensitive
$a = 5;
$A = 10;
echo $a; // print 5
echo "<br>";
echo $A; // print 10
/// a and A are different ( lowercase and uppercase )
echo "<br><br>";


$_hi = 4;
echo $_hi;
echo "<br><br>";

// we cannot declare variable start with number, symbol #, (, ), ....
// except $ and _ 
// $2hi = 59; => incorrect
// $_hi = 59; => correct

/// function 
/// allow us to reused
function saySth()
{
    echo "This is a function!";
    echo "<br>";
}

saySth();


////////////////////////////////////////////////////////////////////////////////////////////
/* CHAPTER 4 */
/* TRUE OR FALSE */
// 0 is false
// 1 is true
// but if it false, it will show nothing
echo 8 > 9;
echo "<br>";
echo 3 + 6 <= 9;
echo "<br><br>";

// conditional statement 
// (if, else if, else)
$age = 12;

if ($age >= 50) {
    echo "You are old<br>";
} else if ($age >= 18) {
    echo "You can are an adult<br>";
} else {
    echo "You are a kid<br>";
}

// switch

switch ($age) {
    case 12:
        echo "You are 12 years old<br>";
        break;
    case 18:
        echo "You are 18 years old<br>";
        break;
    default:
        echo "You are not 12 or 18 years old<br>";
}
echo "<br>";



//// loop
//// for loop
for ($i = 0; $i < 5; $i++) {
    echo $i . "<br>";
}

$j = 0;
while($j< 5){
    echo "Hi<br>";
    $j++;
}

$j = 0;
do {
    echo "Hello<br>";
    $j++;
} while ($j < 5);
echo "<br><br>";




//// jump statement
// break, continue
for ($i = 0; $i < 10; $i++) {
    if ( $i == 3) {
        echo "i = $i<br>";
        continue;
    } else if ($i == 6){
        echo "i = $i<br>";
        break;
    }else {
        echo "$i<br>";
    }
}
echo "<br><br>";

// return 
function myFunc ($x){
    return $x++;
}

echo myFunc(5);