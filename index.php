<?php
session_start();
require 'config.php';

// get current user from database
if (isset($_SESSION['user-id-session'])) {
    $id = filter_var($_SESSION['user-id-session'], FILTER_SANITIZE_NUMBER_INT);
    $statement = $conn->prepare('SELECT * FROM users WHERE id = :id ');
    $statement->bindValue(':id', $id); 
    $statement->execute();
    $statement_result = $statement->fetch(PDO::FETCH_ASSOC); 

  }else{
    header('location: ' . DOMAIN . 'login.php');
    exit();
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
  <h2> Hello <?php echo $statement_result['fullname'] ?> </h2>
    <a href="logout.php">logout</a> 
    
</body>
</html>