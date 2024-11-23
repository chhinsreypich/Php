<!-- 
    heroku = free website
    vercel = free website
    netlify = free website
    github pages = free website

    chapter 3
    1. echo (pirnt_r() adn var_dump())
    2. comment
    3. basic ($, ;)
    4. variable
    5. arrays
    6. variable naming rules (A-Z, 0-9, and _)
        + $high_score #High_score
    7. operators
        + arithmetic operator
        + assignment operator
        + comparison operator
        + logical operator
        + string operator
    


    chapter 4
    1. conditional statement
        + if
        + if-else
        + if-elseif-else
    2. switch statement
    3. loops
        + for
        + while
        + do-while
    
    4. jump statement
        + break
        + continue
        + return

    



    


-->

<?php
//// no need data type. just use $ to declare variable


$number = 30;
$password = "myPass";
$user = array("somnang", "lola", "kagna");

//// everything use $
for ($i = 0; $i < 3; $i++) {
    echo "$user[$i] ";
}

echo $number;
echo "<br>";
echo " hello world";
echo "<br>";
echo $password;
echo "<br>";
echo $user[0];
echo "<br>";
// print_r($user);
echo "<br>";
echo $user[0] . "<br>"; /// we can use html tag in php like this


/// associative array
/// we can not use for loop
/// this array use for each loop 

$product = array(
//   key    =>  value    
    "marker" => "blue", 
    "pen" => "red", 
    "computer" => "black",
);

foreach($product as $key => $value) {
    /// for javascript we use + to concate string 
    /// but in php we use . to concate string
    //// samee 
    // echo $key." : ".$value."<br>";
    echo "$key : $value <br>";

}

/// we can use foreach with simple array like this
foreach ($user as $user){
    echo $user."<br>";
}

$num1 = 30;
$num2 = 200;

echo $num1 + $num2."<br>";

if ($num1 < $num2){
    echo "This is the if statement: ".$num1;
} else {
    echo "This is the else statement: ".$num2;
}

echo "<br>";


$page = "Home";
switch ($page){
    case "Home":
        echo "Selected Home";
        break;
    case "About":
        echo "Selected About";
        break;
    default: 
        // break;
}

echo "<br>";

////// ch 5
/// function 
echo date("l"); /// l for ngaii name
// F for full month
// j for ngai ti main 
// g for time 
// a for am and pm 
// y for full year
// i for minutes
// s for seconds
// H for hour
// m for month
// d for day
// l for day of the week
// w for day of the week in number
// t for number of days in the month
// z for day of the year
// L for whether it's a leap year
// o for ISO-8601 year number
// n for month without leading zeros
// w for day of the week in number
// B for Swatch Internet time
// g for hour without leading zeros
// G for hour in 24-hour format without leading zeros
// h for hour in 12-hour format with leading zeros
// i for minutes with leading zeros
// s for seconds with leading zeros
// u for microseconds
echo "<br>";
echo date("F j, Y, H:i a");
echo "<br>";
echo date("l F j, Y");
echo "<br>";
echo date("<br> g H");












?>

<!-- 
homework 
summarize what we do this class
for next week 
teacher will ask u and check everyone 
summarize ch 3-4 
-->