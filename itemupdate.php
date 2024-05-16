<?php 

require 'dbconnect.php';

$id = $_POST['id'];
$oldPhoto = $_POST['oldPhoto'];
$name = $_POST['name'];
$newPhoto = $_FILES['photo'];
$newPhotoname = $newPhoto['name'];
$unitprice=$_POST['unitprice'];
$discount=$_POST['discount'];
$description=$_POST['description'];
$brandid=$_POST['brandid'];
$subcategoryid=$_POST['subcategoryid'];
$item_code=$_POST['oldcode'];


// var_dump($brandid);
// var_dump($subcategoryid);

if ($newPhoto['size']>0) {
	unlink($oldPhoto);
	$source_dir="item/";
	$file_name = mt_rand(100000,999999);
	$file_exe_array = explode('.', $newPhotoname);
	$file_exe = $file_exe_array[1];

	$file_path = $source_dir.$file_name.'.'.$file_exe;
	move_uploaded_file($newPhoto['tmp_name'], $file_path);
} else {
	$file_path = $oldPhoto;
}

$sql = "UPDATE items SET codeno=:codeno,name=:name,photo=:photo,price=:price,discount=:discount,description=:description,brand_id=:brand_id,subcategory_id=:subcategory_id WHERE id=:id";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->bindParam(':codeno',$item_code);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':photo',$file_path);
$stmt->bindParam(':price',$unitprice);
$stmt->bindParam(':discount',$discount);
$stmt->bindParam(':description',$description);
$stmt->bindParam(':brand_id',$brandid);
$stmt->bindParam(':subcategory_id',$subcategoryid);
$stmt->execute();
header("location:itemlist.php");
 ?>