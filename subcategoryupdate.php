<?php 
require 'dbconnect.php';
$id = $_POST['id'];
$category_id = $_POST['categoryid'];
$name = $_POST['name'];

// var_dump($name);
// var_dump($category_id);

$sql = "UPDATE subcategories SET name=:name,category_id=:categoryid WHERE id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':categoryid',$category_id);
$stmt->execute();
header("location:subcategorylist.php");
 ?>