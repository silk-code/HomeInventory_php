<?php include "header.php"; ?>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h2>Login</h2>
        <form action="loginVerifyPage.php" method="post">
            Username <input type="text" name="username"/><br>
            Password <input type="password" name="password" /><br>
            <input type="submit" name="login" value="Login"/>
        </form>
        <?php include "footer.php"; ?>
    </body>
</html>


