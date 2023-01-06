<?php
switch($_POST["type"]){
    case "featured":
        //Fetch cards
        $result = $conn->query("UPDATE Dhimans SET featured='$value' WHERE id=$id");
        if ($result === TRUE) {
            $value == "1" ? print('success: Added to featured') : print('success: Removed from featured');
            return 1;
        } else {
            print('failure: Try again');
            return 1;
        }
        $conn->close();
        break;
    default:
        die("Not Allowed");
        break;
}
?>
