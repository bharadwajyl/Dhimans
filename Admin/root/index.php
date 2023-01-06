<?php
//Check the type of the form posted
switch ($_POST["FormType"]) {
    case "Add_Product":
        Product::Add(''.$_POST['pname'].'', ''.$_POST['price'].'', ''.$_POST['desc'].'');
        break;
    case "update":
        Product::Update(''.$_POST["id"].'', ''.$_POST["value"].'',''.$_POST["type"].'');
        break;
    default:
        die("Not Allowed");
        break;
}

class Product{
    public function Add($pname, $price, $desc){
        try {
            require("db.php");
            include("insert.php");
        }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }
    public function Update($id, $value, $type){
        try {
            require("db.php");
            include("update.php");
        }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }
}
?>
