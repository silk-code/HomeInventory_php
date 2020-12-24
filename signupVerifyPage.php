<?php
include "header.php"; 
?>
<html>
    <head>
        <title>Response page</title>
    </head>
    <body>
        <?php
        $_SESSION['loggedIn']=False;//preset to false
        $username=$_POST['username'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password']; 
        $repPassword=$_POST['repPassword'];
        $mysqli=new mysqli('127.0.0.1','root','','homeinventory');//connect
        
        if($password===$repPassword){
            if($mysqli->connect_errno){ //error
                echo "Sorry, this website is experiencing problems <br>";
                exit;
            }

            $sql="INSERT INTO `user`( `username`, `encrPassword`, `name`, `email`)"
                    . " VALUES ('".$username."','"."encr".$password."','".$name."','".$email."')";
            if ($mysqli->query($sql) === TRUE) {
                $id= $mysqli->insert_id;//get itemID
                $_SESSION['loggedIn']=True;
                //create cookie
                setcookie('username', $username, );
                setcookie ('id',$id); 
                echo "Welcome, " .$username."!<br>";
            } else {
                echo "We're experiencing problems, please try again later.";
            }
            
            $mysqli -> close();
        }
        else{
            echo "Passwords don't match. Please try again.";
        }
        include "footer.php"; 
        ?>
    </body>
</html>

