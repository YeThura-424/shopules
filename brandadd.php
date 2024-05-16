<?php 
require 'dbconnect.php';

$name = $_POST['name'];
$logo = $_FILES['logo'];
$logoname = $logo['name'];


$source_dir="image/";
$file_name = mt_rand(100000,999999);
$file_exe_array = explode('.', $logoname);
$file_exe = $file_exe_array[1];

$file_path = $source_dir.$file_name.'.'.$file_exe;
move_uploaded_file($logo['tmp_name'], $file_path);

$sql = "INSERT INTO brands (name,logo) VALUES(:name, :logo)";
$stmt = $conn->prepare($sql);
$stmt ->bindParam(':name',$name);
$stmt ->bindParam(':logo',$file_path);
$stmt->execute();

header("location:brandlist.php");

 ?>