<?php 
require 'dbconnect.php';
include("BackEnd_Header.php");

?>

<main class="app-content">
            <div class="app-title">
                <div>
                    <h1> <i class="icofont-list"></i> Item Form </h1>
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
                            <form action="itemadd.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                                    <div class="col-sm-10">
                                      <input type="file" id="photo_id" name="photo">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="name_id" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="photo_id" class="col-sm-2 col-form-label"> Price </label>
                                    <div class="col-sm-10">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#oldprofile" role="tab" aria-controls="home" aria-selected="true">Unit Price</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#newprofile" role="tab" aria-controls="profile" aria-selected="false">Discount</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="oldprofile" role="tabpanel" aria-labelledby="home-tab"><input type="text" class="form-control" id="unitprice" name="unitprice"></div>
                                            <div class="tab-pane fade" id="newprofile" role="tabpanel" aria-labelledby="profile-tab"><input type="text" class="form-control" id="discount" name="discount"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name_id" class="col-sm-2 col-form-label"> Description </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="description"></textarea>
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
                                          <option>Choose Brand</option>
                                          <?php foreach ($brands as $brand) { 
                                            $id=$brand['id'];
                                            $name=$brand['name'];
                                            ?>
                                            <option value="<?=$id?>"><?= $name ?></option>
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
                                          <option>Choose Sub-ategory</option>
                                          <?php foreach ($subcategories as $subcategory) { 
                                            $id=$subcategory['id'];
                                            $name=$subcategory['name'];
                                            ?>
                                            <option value="<?=$id?>"><?= $name ?></option>
                                            <<?php } ?>
                                             
                                           
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                    	<!-- button cannot be a-tag or type=button -->
                                        <button type="submit" class="btn btn-primary">
                                            <i class="icofont-save"></i>
                                            Save
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