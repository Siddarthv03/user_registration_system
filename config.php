<?php
define( 'DOMAIN', 'http://localhost/login-registration-system/');

$host_name = "localhost";
$username = "root";
$password = "";
$db_name = "login_registration_system";

try {
    $conn = new PDO("mysql:host=$host_name; dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "connection failed : ". $e->getMessage();

}