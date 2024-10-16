<?php
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass = password_hash($pass, PASSWORD_DEFAULT);
$dbh = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
//$mysqli = new mysqli('localhost', 'root', '', 'blog');
$stmt= $dbh->prepare("SELECT * FROM `users` WHERE email = :email");
$stmt->execute(array('email'=>$email));
if($stmt->rowCount()){
    exit("User exist");
}else{
    $stmt= $dbh->prepare("INSERT INTO users (name, email, pass) VALUES (:name, :email, :pass)");
    $stmt->execute(array(
        'name'=>$name,
        'email'=>$email,
        'pass'=>$pass
    ));
    echo "success!";
}