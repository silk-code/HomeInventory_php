<?php
include "header.php";
?>
<html>
    <head>
        <title>Delete Item</title>
    </head>
    <body>
        <?php
        $continue=False;
        if(!isset($_SESSION['loggedIn'])||$_SESSION['loggedIn']===False){
            echo "<a href='loginPage.php'>Please log in<a>";
        }
        else{
            $continue=True;
        }
        if($continue){
            $mysqli=new mysqli('127.0.0.1','root','','homeinventory');//connect
            if($mysqli->connect_errno){ //error
                echo "Sorry, this website is experiencing problems <br>";
                $continue=False;
            }
            if($continue){
                echo "<h2>Deleting item...</h2> <br>";
                $sql="DELETE FROM `useritem` WHERE `useritem`.`itemID` = ".$_POST['itemID'];
                if (!$mysqli->query($sql) === TRUE) {
                    echo "can't delete item";
                    exit;
                }
                $sql2="DELETE FROM `item` WHERE `item`.`itemID` = ".$_POST['itemID'];
                if (!$mysqli->query($sql) === TRUE) {
                    echo "can't delete item";
                    exit;
                }
                else{
                    echo "<h4>Success! Item was deleted.</h4>";
                }
                $mysqli -> close();
            }
        }
        include "footer.php";
        ?>
    </body>
</html>

