<?php
session_start();
require 'config.php';

// this returns back the form details if there was an error
$fullname = $_SESSION['registration-data']['fullname'] ?? null;
$username = $_SESSION['registration-data']['username'] ?? null;
$password = $_SESSION['registration-data']['password'] ?? null;
$rpassword = $_SESSION['registration-data']['rpassword'] ?? null;

// delete the registration session
unset($_SESSION['registration-data']);
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

    <h2>Registration System in PHP</h2>
    <form action="register_process.php" method="post">
        <!-- error message -->
        <?php
            if (isset($_SESSION['register_error'])) : ?>   
        <p style="color: red; text-align: center;"><?= $_SESSION['register_error']; unset($_SESSION['register_error']);?></p><br>
       <?php endif ?>
       <!-- /error message -->
        <input type="text" value="<?= $fullname ?>" name="fullname" placeholder="Full Name"><br>
        <input type="text" name="username" value="<?= $username ?>" placeholder="Username"><br>
        <input type="password" name="password" value="<?= $password ?>" placeholder="Password"><br>
        <input type="password" name="rpassword" value="<?= $rpassword ?>" placeholder="Retype-Password"><br>
        <input type="submit" name="submit" value="Register">
        <a href="login.php">Already a Member, Login</a>
    </form>
</body>
</html>