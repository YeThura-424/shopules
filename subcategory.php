<?php 

include("Frontend_Header.php");

 ?>
 <?php 

 include("Frontend_Nav.php");

  ?>
  <?php 

 include("dbconnect.php");
 // var_dump($conn);

 $id=$_GET['id'];
 // var_dump($id);
 $sql="SELECT * FROM subcategories WHERE id=:id";
 $stmt=$conn->prepare($sql);
 $stmt->bindParam(':id',$id);
 $stmt->execute();
 $subcategories=$stmt->fetch(PDO::FETCH_ASSOC);
 // var_dump($subcategories);
 $sname=$subcategories['name'];
 $sid=$subcategories['id'];

  ?>

<!-- Subcategory Title -->
    <div class="jumbotron jumbotron-fluid subtitle">
        <div class="container">
            <h1 class="text-center text-white"> <?= $sname?> </h1>
        </div>
    </div>
    <!-- Content -->
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bg-transparent">
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none secondarycolor"> Home </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none secondarycolor"> Category </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none secondarycolor"> Category Name </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                   <?= $sname?>
                </li>
            </ol>
        </nav>
        <div class="row mt-5">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <ul class="list-group">

                    <li class="list-group-item">
                        <a href="" class="text-decoration-none secondarycolor"> Category One </a>
                    </li>
                    <li class="list-group-item active">
                        <a href="" class="text-decoration-none secondarycolor"> Category Two </a>
                    </li>
                    <li class="list-group-item">
                        <a href="" class="text-decoration-none secondarycolor"> Category Three </a>
                    </li>
                    <li class="list-group-item">
                        <a href="" class="text-decoration-none secondarycolor"> Category Four </a>
                    </li>
                    <li class="list-group-item">
                        <a href="" class="text-decoration-none secondarycolor"> Category Five</a>
                    </li>
                </ul>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="row">
                	<?php 
                            $sql="SELECT * FROM items WHERE subcategory_id=$id";
                            $stmt=$conn->prepare($sql);
                            $stmt->execute();
                            $items = $stmt->fetchAll();
                            foreach ($items as $item) {
                                $iid=$item['id'];
                                $iname=$item['name'];
                                $iphoto=$item['photo'];
                                $icodeno=$item['codeno'];
                                $iprice=$item['price'];
                                $idiscount=$item['discount'];
                                
                                ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card pad15 mb-3">
                            <img src="<?=$iphoto?>" class="img-fluid" style="height:170px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title text-truncate text-muted"><?="YT_".$icodeno ?></h5>
                                <h5 class="card-title text-truncate"><?=$iname ?></h5>
                                <p class="item-price">
                                    <?php if($idiscount): ?>
                                    <strike><?=$iprice."MMK"?></strike>
                                    <span class="d-block"><?=$idiscount."MMK"?></span>
                                    <?php else: ?>
                                        <span class="d-block"><?=$iprice ."MMK"?></span>
                                    <?php endif ?>
                                </p>
                                <div class="star-rating">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><i class='bx bxs-star'></i></li>
                                        <li class="list-inline-item"><i class='bx bxs-star'></i></li>
                                        <li class="list-inline-item"><i class='bx bxs-star'></i></li>
                                        <li class="list-inline-item"><i class='bx bxs-star'></i></li>
                                        <li class="list-inline-item"><i class='bx bxs-star-half'></i></li>
                                    </ul>
                                </div>
                                <a href="#" class="addtocartBtn text-decoration-none">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="icofont-rounded-left"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="icofont-rounded-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="container-fluid bg-light p-5 align-content-center align-items-center mt-5">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="row">
                    <div class="col-md-4">
                        <i class="icofont-fast-delivery serviceIcon maincolor"></i>
                    </div>
                    <div class="col-md-8">
                        <h6>Door to Door Delivery</h6>
                        <p class="text-muted" style="font-size: 12px">On-time Delivery</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="row">
                    <div class="col-md-4">
                        <i class="icofont-headphone-alt-2 serviceIcon maincolor"></i>
                    </div>
                    <div class="col-md-8">
                        <h6> Customer Service </h6>
                        <p class="text-muted" style="font-size: 12px"> 09-779-999-915 ၊ <br> 09-779-999-913 </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="row">
                    <div class="col-md-4">
                        <i class='bx bx-undo serviceIcon maincolor'></i>
                    </div>
                    <div class="col-md-8">
                        <h6> 100% satisfaction </h6>
                        <p class="text-muted" style="font-size: 12px"> 3 days return </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="row">
                    <div class="col-md-4">
                        <i class="icofont-credit-card serviceIcon maincolor"></i>
                    </div>
                    <div class="col-md-8">
                        <h6> Cash on Delivery </h6>
                        <p class="text-muted" style="font-size: 12px"> Door to Door Service </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h1> News Letter </h1>
                <p>
                    Subscribe to our newsletter and get 10% off your first purchase
                </p>
            </div>
            <div class="offset-2 col-8 offset-2 mt-5">
                <form>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg px-5 py-3" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" style="border-top-left-radius: 15rem; border-bottom-left-radius: 15rem">
                        <div class="input-group-append">
                            <button class="btn btn-secondary subscribeBtn" type="button" id="button-addon2"> Subscribe </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


  <?php 

    include("Frontend_Footer.php");
     ?>