<?php
session_start();
require 'config.php';

if(isset($_POST['submit'])){
 
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


     if (!$username) {
       $_SESSION['login_error'] = "Username is required";
    }elseif(!$password){
        $_SESSION['login_error'] = "password is required";
    }else{

         //get user information from database
    $statement = $conn->prepare('SELECT * FROM users WHERE username = :username ');
    $statement->bindValue(':username', $username); 
    $statement->execute();
    $statement_result = $statement->rowcount();

    if ($statement_result === 1) {
        //convert record to an array
        $get_user = $statement->fetch(PDO::FETCH_ASSOC); 
        
         $database_password = $get_user['password'];

         //compare form password wth database password
         if (password_verify($password, $database_password)) { 
             // set session for access control 
             $_SESSION['user-id-session'] = $get_user['id']; 
             //log the person in
             header('location: ' . DOMAIN . 'index.php');               
            
            }else {
             $_SESSION['login_error'] = "Incorrect Username or Password"; 
             
                 }
        }else {
        $_SESSION['login_error'] = "User not found";
        
         }
    }

    // redirect to login page if error 
if (isset($_SESSION['login_error'])) {
    //pass form back to login page  
    $_SESSION['login-data'] = $_POST;
   header('location: ' . DOMAIN . 'login.php');
   exit();

}
}else{
    //if button was not clicked
    header('location: ' . DOMAIN . 'login.php');
    exit();
}