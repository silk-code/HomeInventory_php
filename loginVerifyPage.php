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
        $password='encr'.$_POST['password'];       
        $mysqli=new mysqli('127.0.0.1','root','','homeinventory');//connect
        
        if($mysqli->connect_errno){ //error
            echo "Sorry, this website is experiencing problems <br>";
            exit;
        }
            
        $sql="SELECT username, userid FROM user WHERE username='$username' and encrpassword='$password'";
        if(!$result = $mysqli->query($sql)){
            echo "Sorry, the website is experiencing problems <br>";
            echo "no rows";
            exit;
        }
        if($result->num_rows>0){//found a match, can log in
            $_SESSION['loggedIn']=True;
            $id=$result->fetch_assoc()['userid'];
            //create cookie
            setcookie('username', $username,  );
            setcookie ('id',$id); 
            echo "Welcome back, " .$username."!<br>";
        }
        $mysqli -> close();
        include "footer.php"; 
        ?>
    </body>
</html>




