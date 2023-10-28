<?php
session_start();
require 'config.php';

// this returns back the form details if there was an error 
$username = $_SESSION['login-data']['username'] ?? null;
$password = $_SESSION['login-data']['password'] ?? null; 

// delete the registration session
unset($_SESSION['login-data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login and Registration system in PHP</title>
</head>
<body>
    
    <h2>Login System in PHP</h2>
    
    <form action="login_process.php" method="post">
<!-- error message -->
<?php
        if (isset($_SESSION['register_success'])) : ?>   
    <p style="color: green; text-align: center"><?= $_SESSION['register_success']; unset($_SESSION['register_success']);?></p><br>
    <?php elseif (isset($_SESSION['login_error'])) : ?>   
        <p style="color: red; text-align: center;"><?= $_SESSION['login_error']; unset($_SESSION['login_error']);?></p><br>
        <?php endif ?>
        
        <!--/ error message -->

        <input type="text" value="<?= $username ?>" name="username" placeholder="Username"><br>
        <input type="password" value="<?= $password ?>" name="password" placeholder="Password"><br> 
        <input type="submit" name="submit" value="Login">
        <a href="register.php">Not a Member, Register</a>
    </form>
</body>
</html>