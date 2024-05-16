<?php 
require 'dbconnect.php';
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];
$address=$_POST['address'];

$sql = "INSERT INTO users (name,email,password,phone,address) VALUES(:name, :email,:password,:phone,:address)";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':password',$password);
$stmt->bindParam(':phone',$phone);
$stmt->bindParam(':address',$address);
$stmt->execute();

header("location:login.php");

session_start();
$_SESSION['reg_success'] = 'Thanks! Your Account Has Been Successfully Created and Now Logged In Please'

 ?>: