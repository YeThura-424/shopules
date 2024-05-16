<?php 
$_Host="localhost";
$_DbName="zdykpszw_shopules";
$_User="zdykpszw_yethura";
$_Password="yethura154980";

try{
	$conn = new PDO("mysql:host=$_Host;dbname=$_DbName",$_User,$_Password);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	// echo "successfully connected";
}catch (PDOException $e){
	echo $e->getmessage();
}



 ?>