<?php
require 'dbconnect.php';

$name = $_POST['name'];
$image = $_FILES['photo'];
$imagename = $image['name'];
$unitprice = $_POST['unitprice'];
$discount = $_POST['discount'];
$description = $_POST['description'];
$brandid = $_POST['brandid'];
$subcategoryid = $_POST['subcategoryid'];

$source_dir = "item/";
$file_name = mt_rand(100000, 999999);
$file_exe_array = explode('.', $imagename);
$file_exe = $file_exe_array[1];

$file_path = $source_dir . $file_name . '.' . $file_exe;
move_uploaded_file($image['tmp_name'], $file_path);

$item_code = mt_rand(100000, 999999);
// var_dump($discount);
// var_dump($unitprice);
// var_dump($name);


$sql = "INSERT INTO items (codeno,name,photo,price,discount,description,brand_id,subcategory_id) VALUES(:codeno,:name,:photo,:price,:discount,:description,:brandid,:subcategoryid)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':codeno', $item_code);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':photo', $file_path);
$stmt->bindParam(':price', $unitprice);
$stmt->bindParam(':discount', $discount);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':brandid', $brandid);
$stmt->bindParam(':subcategoryid', $subcategoryid);

$stmt->execute();

header("location:itemlist.php");
