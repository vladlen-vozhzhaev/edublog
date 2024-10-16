<?php
session_start();
$email = $_POST['email'];
$pass = $_POST['pass'];
$mysqli = new mysqli('localhost', 'root', '', 'blog');
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
$row = $result->fetch_assoc();
if($result->num_rows && password_verify($pass, $row['pass'])){
    $_SESSION['name'] = $row['name'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['id'] = $row['id'];
    header('Location: /profile.php');
}else{
    echo "error";
}