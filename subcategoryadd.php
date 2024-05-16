<?php 
require 'dbconnect.php';

$name = $_POST['name'];
$category_id = $_POST['categoryid'];

$sql = "INSERT INTO subcategories (name,category_id) VALUES(:name, :categoryid)";
$stmt = $conn->prepare($sql);
$stmt ->bindParam(':name',$name);
$stmt ->bindParam(':categoryid',$category_id);
$stmt->execute();
header("location:subcategorylist.php");
 ?>