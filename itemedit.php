<?php 
require 'dbconnect.php';
include("BackEnd_Header.php");
// get id from address bar 
$id = $_GET['id'];

$sql = "SELECT * FROM items WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

$item = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php  $sql = "SELECT * FROM items WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

$items = $stmt->fetch(PDO::FETCH_OBJ);
?>
<main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Item Edit Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="itemlist.php" class="btn btn-outline-primary">
                        <i class="icofont-double-left"></i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="itemupdate.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $item['id']?>">
                                <input type="hidden" name="oldcode" value="<?= $item['codeno']?>">
                                <input type="hidden" name="oldPhoto" value="<?= $item['photo']?>">
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name" value="<?= $item['name']?>">
                                    </div>
                                </div>
                                <!-- photo -->
                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                                    <div class="col-sm-10">
                                     	<ul class="nav nav-tabs" id="myTab" role="tablist">
		                                    <li class="nav-item" role="presentation">
		                                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#oldprofile" role="tab" aria-controls="home" aria-selected="true">Old Photo</a>
		                                    </li>
		                                    <li class="nav-item" role="presentation">
		                                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#newprofile" role="tab" aria-controls="profile" aria-selected="false">New Photo</a>
		                                    </li>
                                    	</ul>
	                                    <div class="tab-content" id="myTabContent">
	                                      	<div class="tab-pane fade show active" id="oldprofile" role="tabpanel" aria-labelledby="home-tab"><img src="<?= $item['photo']?>" class="img-fluid w-25"></div>
	                                      	<div class="tab-pane fade" id="newprofile" role="tabpanel" aria-labelledby="profile-tab"><input type="file" id="photo_id" name="photo"></div>
	                                    </div>
                                    </div>
                                </div>
                                <!-- price -->
                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Price </label>
                                    <div class="col-sm-10">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#unitprice" role="tab" aria-controls="home" aria-selected="true">Unit Price</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#discount" role="tab" aria-controls="profile" aria-selected="false">Discount</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="unitprice" role="tabpanel" aria-labelledby="home-tab"><input type="text" class="form-control" id="unitprice" name="unitprice" value="<?= $item['price']?>"></div>
                                            <div class="tab-pane fade" id="discount" role="tabpanel" aria-labelledby="profile-tab"><input type="text" class="form-control" id="discount" name="discount" value="<?= $item['discount']?>"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Description </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="description" value="<?= $item['description']?>"><?= $item['description']?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Brand </label>
                                    <div class="col-sm-10">
                                        <?php 
                                        $sql="SELECT * FROM brands";
                                        $stmt=$conn->prepare($sql);
                                        $stmt->execute();
                                        $brands = $stmt->fetchAll();
                                         ?>
                                      <select class="form-control" name="brandid">
                                          <!-- <option>Choose Brand</option> -->
                                          <?php foreach ($brands as $brand) { 
                                            $id=$brand['id'];
                                            $name=$brand['name'];
                                            ?>
                                            <option value="<?=$id?>" <?php if($items->brand_id==$brand['id']) {
                                                echo "selected";
                                            }?>><?= $name ?></option>
                                            <<?php } ?>
                                             
                                           
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Sub-ategory </label>
                                    <div class="col-sm-10">
                                        <?php 
                                        $sql="SELECT * FROM subcategories";
                                        $stmt=$conn->prepare($sql);
                                        $stmt->execute();
                                        $subcategories = $stmt->fetchAll();
                                         ?>
                                      <select class="form-control" name="subcategoryid">
                                          <!-- <option>Choose Sub-ategory</option> -->
                                          <?php foreach ($subcategories as $subcategory) { 
                                            $id=$subcategory['id'];
                                            $name=$subcategory['name'];
                                            ?>
                                            <option value="<?=$id?>" <?php if($items->subcategory_id==$subcategory['id']) {
                                                echo "selected";
                                            }?>><?= $name ?></option>
                                            <<?php } ?>
                                             
                                           
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                    	<!-- button cannot be a-tag or type=button -->
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icofont-save"></i>
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
<?php 

    include("BackEnd_Footer.php");


?>