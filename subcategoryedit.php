<?php 
require 'dbconnect.php';
include("BackEnd_Header.php");
// get id from address bar 
$id = $_GET['id'];

$sql = "SELECT * FROM subcategories WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

$subcategories = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<?php
$sql = "SELECT * FROM subcategories WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();

$subcategory = $stmt->fetch(PDO::FETCH_OBJ);


?>

<main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Subcategory Edit Form </h1>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <a href="subcategorylist.php" class="btn btn-outline-primary">
                        <i class="icofont-double-left"></i>
                    </a>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <form action="subcategoryupdate.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $subcategories['id']?>">
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name" value="<?= $subcategories['name']?>">
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Category </label>
                                    <div class="col-sm-10">
                                        <?php 
                                        $sql="SELECT * FROM categories";
                                        $stmt=$conn->prepare($sql);
                                        $stmt->execute();
                                        $categories = $stmt->fetchAll();
                                         ?>
                                      <select class="form-control" name="categoryid">
                                          <!-- <option>Choose Brand</option> -->
                                          <?php foreach ($categories as $category) { 
                                            $id=$category['id'];
                                            $name=$category['name'];
                                            ?>
                                            <option value="<?=$id ?>" <?php if($subcategory->category_id==$category['id']) {
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