<!-- 
extends class aas quiz 

-->
<?php

$object = new Subscriber;
$object->name = "John";
$object->email = "john@example.com";
$object->password = "pword";
$object->phone = "03923290";
$object->display();
$object->save_user();
echo "<br>";


class User
{
    public $name, $password;
    function save_user()
    {
        echo "User Saved";
        echo "<br>";
    }
}
class Subscriber extends User
{
    public $email, $phone;
    function display()
    {
        echo "Name: $this->name <br>";
        echo "password: $this->password <br>";
        echo "Email: $this->email <br>";
        echo "Phone: $this->phone <br>";
    }
}

// cannot use parent as a name of class
// cuz parent is the keyword in php
// so we cannot use it as a name 
// like function 
// but we can use parent with s

$object2 = new Child;
$object2->name = "John";
$object2->phone =  "024934028";
$object2->email = "thawy@gmail.com";
$object2->car = "";
$object2->house = "39043";
$object2->info();



class Parents
{
    public $car, $house;
    function saving()
    {
        echo "Parent Saving";
    }
}
class Child extends Parents
{
    public $name, $phone, $email;
    function info()
    {
        echo "Name: $this->name <br>";
        echo "Phone: $this->phone <br>";
        echo "Email: $this->email <br>";
        echo "House: $this->house <br>"; /// from parents
        echo "Car: $this->car <br>"; /// from parents
        echo "<br>";
    }
}

//// array chapter 6 overview
echo "Array<br>";
$fruit = array("banana", "orange", "apple", "mango", "grape");
echo $fruit[0];
echo "<br>";
echo "<br>";

echo "Associative array<br>";
$product = array(
    "fruit" => "apple",
    "drink" => "coke",
    "food" => "baymorn"
);
foreach ($product as $key => $value) {
    echo "$key: $value <br>";
}
echo "<br>";


$product2 = array(
    "fruit" => array(
        "apple" => "red",
        "banana" => "yellow",
        "orange" => "orange"
    ),
    "vegetable" => array(
        "potato" => "brown",
        "carrot" => "orange",
        "tomato" => "red"
    ),

);
foreach ($product2 as $section => $items){
    foreach ($items as $key =>$value){
        echo "$section: $key: $value <br>";

    }
}

if(is_array($product)){
    echo "yesssssssss!!!!!!!!!!!!!";
}  else {
    echo "no";
}
echo "<br>";
$forSort = [ 12,-5,3,4];
echo sort($forSort);
// foreach ( $forSort as $forSort){
//     echo $forSort;
// }
echo "<br>";

//// timestamp()
//// time 
$time = time() + 16 *24 * 60 * 60;
echo $time;
echo "<br>";
echo date ("l F jS, Y - g:ia", $time);
echo "<br>";

