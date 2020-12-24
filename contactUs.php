<?php
    include "header.php";
    if(filter_has_var(INPUT_POST, 'submit')){
        
        $name= htmlspecialchars($_POST['name']);
        $email=htmlspecialchars($_POST['email']);
        $message=htmlspecialchars($_POST['message']);
        
        if(!empty($email)&&!empty($name)&&!empty($message)){
            if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
                //fail
                echo"<h3>Please use valid email</h3>";
            }else{
                require 'PHPMailer-master/PHPMailerAutoload.php';
                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->SMTPSecure = 'ssl';
                $mail->SMTPAuth = true;
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 465;
                $mail->Username = 'homeinventory.contact@gmail.com';
                $mail->Password = 'ThisIsMyFirstWebSite';
                $mail->setFrom('homeinventory.contact@gmail.com');
                $mail->addAddress('homeinventory.contact@gmail.com');
                $mail->Subject = 'Contact request from '.$name;
                $mail->Body = 'Name: '.$name.' Email: '.$email.' '.$message;
                //send the message, check for errors
                if (!$mail->send()) {
                    echo "ERROR: " . $mail->ErrorInfo;
                } else {
                    echo "<h3>Thanks for contacting us!</h3>";
                }
            }
        }else{
            echo "<h3>All fields are required</h3>";
        }
    }
?>
<hmtl>
    <head>
        <title>Contact Us</title>
        <LINK rel="stylesheet" href="styles.css" type="text/css" />
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="Post">
            Name: <input type='text' name='name'  value='<?php echo isset($_POST['name']) ? $name : '';?>'><br>
            Email: <input type='text' name='email'  value='<?php echo isset($_POST['email']) ? $email : '';?>'><br>
            <textarea name='message' rows='10' cols='60' wrap='virtual' ><?php echo isset($_POST['message']) ? $message : '';?></textarea><br>
            <button type='submit' name='submit'>Submit</button>
        </form>
    </body>
    <?php include "footer.php"; ?>
</hmtl>
