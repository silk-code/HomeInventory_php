<?php
    include "header.php";
    $mysqli=new mysqli('127.0.0.1','root','','homeinventory');//connect
    if($mysqli->connect_errno){ //error
            echo "Sorry, this website is experiencing problems <br>";
            exit;
    } 
    $amount=$_POST['amount'];
    if( $amount<0 ){
        echo "Can't add item of 0 amount";
        echo "<a href='Main.php'>Back to main<a>";
    }else{
        $name=$_POST['name'];
        $category=$_POST['category'];  
        $isPerishable='0';
        if (array_key_exists ('isPerishable', $_POST)){
            $isPerishable='1';
        } 
        $note=$_POST['note'];
        $updateItem = "UPDATE `item` SET `categoryID`=".$category.
				",`description`='".$name."',`isPerishable`=".$isPerishable.
				",`Note`='".$note."' WHERE itemID=".$_POST['itemID'];
        if (!$mysqli->query($updateItem) === TRUE) {
            echo "can't insert item";
            exit;
        }
        $unit=$_POST['unit'];
        $location=$_POST['locationStored'];
        $user=$_COOKIE['id'];    
        $updateUserItem="update useritem set locationId=".$location.",unitId=".$unit.",qty=".$amount;

        if ($mysqli->query($updateUserItem) === TRUE) {
            echo "<h2>Success!!</h2>";
            echo "<h3>Item Updated: ".$name."</h3>";
            echo "<a href='Main.php'>Back to main<a>";
        } else {
            echo"Error not added";
            exit;
        }
         include "footer.php"; 
         $mysqli -> close();
    }
?>