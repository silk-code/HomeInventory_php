<?php
 include "header.php"; 
?>
<html>
    <head>
        <title>Logging out...</title>
    </head>
    <body>
        <?php
            $_SESSION['loggedIn']=False;
        ?>
        <a href="main.php">Back</a>
        <?php include "footer.php"; ?>
    </body>
</html>

