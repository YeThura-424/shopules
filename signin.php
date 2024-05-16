<?php 
require 'dbconnect.php';
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT users.*,roles.name as rname FROM users LEFT JOIN roles ON users.role_id = roles.id WHERE email=:email AND password=:password";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':password',$password);
$stmt->execute();

if ($stmt->rowCount()<= 0) {
	// $_SESSION['loginfail'] = 'Incorrect User Name or Invalid Passord';
	//checking how many times that the user type incorrect passowrd and username
	if (!isset($_COOKIE['loginCount'])) {

		$logincount = 1;

	} else {
		$logincount = $_COOKIE['loginCount'];
		$logincount++;
		
	}
	setcookie('loginCount',$logincount,time()+10);

	if ($logincount >= 3) {
		echo "<img src='frontend/image/hello.gif' style='width:100%; height:100vh; object-fit:cover;''>";
	// unset($_COOKIE['logincount']);
		setcookie('loginCount','',time()-10);
		echo "<script type=\"text/javascript\">
		(function(){setTimeout(function){
			location.href='login.php';
			},10000);
		})(); <script>";
	} else {
		$_SESSION['loginfail'] = 'Incorrect User Name or Invalid Passord';
		header('location:login.php');
	}
	// header('location:login.php');

} else {
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($user);die();
	$_SESSION['loginuser'] = $user;
	$roleid = $user['role_id'];

	if ($roleid==1) {
		header("location:categorylist.php");
	} elseif ($roleid==0) {
		header("location:index.php");
	}
}
?>