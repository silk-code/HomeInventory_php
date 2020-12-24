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
        exit;
    }
    
    $name=$_POST['name'];
    $category=$_POST['category'];  
    $isPerishable='0';
    if (array_key_exists ('isPerishable', $_POST)){
        $isPerishable='1';
    } 
    $note=$_POST['note'];
    $insertItem = "INSERT INTO item (categoryID,description, isPerishable, note) VALUES (".$category.",'".$name."',".$isPerishable.",'".$note."')";
    if ($mysqli->query($insertItem) === TRUE) {
        $item= $mysqli->insert_id;//get itemID
    } else {
        echo "can't insert item";
        exit;
        
    }
    $unit=$_POST['unit'];
    $location=$_POST['locationStored'];
    $user=$_COOKIE['id'];    
    $insertUserItem="Insert into useritem (userId,itemId,locationId,unitId,qty)values (".$user.",".$item.",".$location.",".$unit.",".$amount.")";
    
    if ($mysqli->query($insertUserItem) === TRUE) {
        echo "<h2>Success!!</h2>";
        echo "<h3>Item added: ".$name."</h3>";
        echo "<a href='Main.php'>Back to main<a>";
    } else {
        echo"Error not added";
        exit;
    }
     include "footer.php"; 
     $mysqli -> close();
?>

