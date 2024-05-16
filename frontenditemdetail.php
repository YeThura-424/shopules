<?php 

include("Frontend_Header.php");

 ?>
 <?php 

 include("Frontend_Nav.php");

  ?>

<?php 
require 'dbconnect.php';
$id = $_GET['id'];

$sql = "SELECT * FROM items WHERE id=:id";
$stmt= $conn->prepare($sql);
$stmt->bindParam(':id',$id);
$stmt->execute();
$items=$stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($items);
$icodeno = $items['codeno'];
$iname=$items['name'];
$idescription=$items['description'];
$idiscount=$items['discount'];
$iprice=$items['price'];
$iphoto=$items['photo'];
$brand_id=$items['brand_id'];
$subcategory_id=$items['subcategory_id'];



 ?>
<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> <?="YT_".$icodeno ?> </h1>
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
		    	<?php 

                    $sql="SELECT * FROM subcategories WHERE id=:id";
                    $stmt=$conn->prepare($sql);
                    $stmt->bindParam(':id',$subcategory_id);
                    $stmt->execute();
                    $subcategories=$stmt->fetch(PDO::FETCH_ASSOC);
                 ?>
		    	<li class="breadcrumb-item active" aria-current="page">
					<?=$subcategories['name'] ?>
		    	</li>
		  	</ol>
		</nav>

		<div class="row mt-5">
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				
				<img src="<?=$iphoto?>" class="img-fluid" style="max-width: auto !important; height: 500px; object-fit: cover;">
				
			</div>	


			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
				
				<h4> <?=$iname ?> </h4>

				<div class="star-rating">
					<ul class="list-inline">
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star' ></i></li>
						<li class="list-inline-item"><i class='bx bxs-star-half' ></i></li>
					</ul>
				</div>

				<p>
					<?=$idescription ?>
				</p>

				<p> 
					<span class="text-uppercase "> Current Price : </span>
					<?php if($idiscount): ?>
					<span class="maincolor ml-3 font-weight-bolder"><?=$idiscount."MMK"?></span>
					<?php else: ?>
						<span class="maincolor ml-3 font-weight-bolder"><?=$iprice ."MMK"?></span>
						 <?php endif ?>
				</p>

				<p> <?php 
						$sql="SELECT * FROM brands WHERE id=:id";
                        $stmt=$conn->prepare($sql);
                        $stmt->bindParam(':id',$brand_id);
                        $stmt->execute();
                        $brands=$stmt->fetch(PDO::FETCH_ASSOC);
                         ?>
					<span class="text-uppercase "> Brand : </span>
					<span class="ml-3"> <a href="" class="text-decoration-none text-muted"> <?=$brands['name']?> </a> </span>
				</p>


				
				<a href="" class="addtocartBtn text-decoration-none" data-id="<?=$iid ?>" data-name="<?=$iname ?>" data-codeno="<?=$icodeno ?>" data-photo="<?=$iphoto ?>" data-price="<?=$iprice ?>" data-discount="<?=$idiscount ?>"><i class="icofont-shopping-cart mr-2"></i> Add to Cart</a>
				
			</div>
		</div>

		<!-- <div class="row mt-5">
			<div class="col-12">
				<h3> Related Item </h3>
				<hr>
			</div>
			

			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<a href="">
					<img src="image/item/saisai_two.jpg" class="img-fluid">
				</a>
			</div>

			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<a href="">
					<img src="image/item/saisai_three.jpg" class="img-fluid">
				</a>
			</div>

			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<a href="">
					<img src="image/item/saisai_four.jpg" class="img-fluid">
				</a>
			</div>

			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<a href="">
					<img src="image/item/saisai_four.jpg" class="img-fluid">
				</a>
			</div>
		</div> -->

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
		        		<p class="text-muted" style="font-size: 12px">  09-779-999-915 ၊ <br> 09-779-999-913 </p>
			    	</div>
			  	</div>
	  		</div>

	  		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="row">
				    <div class="col-md-4">
				    	<i class='bx bx-undo serviceIcon maincolor'></i>
				    </div>
			    
			    	<div class="col-md-8">
		        		<h6 > 100% satisfaction </h6>
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


	<div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

 <?php 

    include("Frontend_Footer.php");
     ?>