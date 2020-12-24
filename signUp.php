<?php include "header.php"; ?>
<html>
    <head>
        <title>Sign Up</title>
    </head>
    <body>
        <h2>Sign Up</h2>
        <form action="signupVerifyPage.php" method="post">
            Username <input type="text" name="username"/><br>
            Name <input type="text" name="name"/><br>
            Email <input type="email" name="email"/><br>
            Password <input type="password" name="password" /><br>
            Repeat Password <input type="password" name="repPassword" /><br>
            <input type="submit" name="login" value="Login"/>
        </form>
        <?php include "footer.php"; ?>
    </body>
</html>

