<?php
session_start();
?>
<HTML>
    <HEAD>
        <LINK rel="stylesheet" href="styles.css" type="text/css" />
       <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
       <link href="menuAnimation/dist/addDropMenu.css" rel="stylesheet" type="text/css">
    </HEAD>
    <BODY>
        <div class='header'> 
            <div class="container">
                <a href="MAIN.php">
                    <img src='images/logo.png'  />
                </a>
                <div class='centerContainer'>
                    <h1 class='box'>Home Inventory</h1>
                    <?php  include "menu.php"; ?>
                </div>
                <div class="logIn">
                <?php
                    if(!isset($_SESSION['loggedIn'])||$_SESSION['loggedIn']===False){
                        //not logged in
                        echo "<form action='loginPage.php' method='get'>";
                            echo "<input type='submit' name='login' value='Login'></br>";
                        echo "</form>";
                        echo "<form action='signUp.php' method='get'>";
                            echo "<input type='submit' name='signin' value='Sign In'></br>";
                        echo "</form>";
                    }else{
                        //logged in
                        echo "<p>Hi, ".$_COOKIE['username']."</p></br>";
                        echo "<form action='logout.php' method='post'>";
                            echo "<input type='submit' name='logout' value='Log Out'></br>";
                        echo "</form>";
                    }
                ?> 
                </div>
            </div>
        </div>
        
        <div id="page">
            <div id="content-wrap">
                
        

