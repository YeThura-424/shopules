<?php 
require 'dbconnect.php';
include("BackEnd_Header.php");

$id = $_GET['id'];


?>



<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-file-text-o"></i> Invoice</h1>
			<p>A Printable Invoice Format</p>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item"><a href="#">Invoice</a></li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<section class="invoice">
					<div class="row mb-4">
						<div class="col-6">
							<h2 class="page-header"><i class="fa fa-globe"></i> Vali Inc</h2>
						</div>
						<?php 
						$sql = "SELECT * FROM orders WHERE id=:id";
						$stmt = $conn->prepare($sql);
						$stmt->bindParam(':id',$id);	
						$stmt->execute();
						$orders=$stmt->fetch(PDO::FETCH_ASSOC);
						$orderdate=$orders['orderdate'];
						$oid = $orders['user_id'];
						$voucherno = $orders['voucherno'];
						$orderID = $orders['id'];
						?>
						
						<div class="col-6">
							<h5 class="text-right">Date: <?=$orderdate ?></h5>
						</div>
					</div>
					<div class="row invoice-info">
						<div class="col-4">From
							<address><strong>YTR STORE.</strong><br>518 Akshar Avenue<br>Gandhi Marg<br>New Delhi<br>Email: hello@vali.com</address>
						</div>
						<div class="col-4">To
							<?php 
							$sql = "SELECT * FROM users WHERE id=:id";
							$stmt = $conn->prepare($sql);
							$stmt->bindParam(':id',$oid);	
							$stmt->execute();
							$users=$stmt->fetch(PDO::FETCH_ASSOC);
							$uid = $users['id'];

							$name = $users['name'];
							$address = $users['address'];
							$phone = $users['phone'];
							$email = $users['email'];
							?>
							<address><strong><?=$name ?></strong><br><?=$address."<br>" ?><br>Phone: <?=$phone ?><br>Email: <?=$email ?></address>
						</div>
						<div class="col-4"><b>Invoice <?=$voucherno ?></b><br><br><b>Order ID:</b> <?=$orderID ?><br><b>Payment Due:</b><?=$orderdate ?><br><b>Account:</b> 968-34567</div>
					</div>
					<div class="row">
						<div class="col-12 table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Qty</th>
										<th>Product</th>
										<th>Serial #</th>
										<th>Description</th>
										<th>Price</th>
										<th>Subtotal</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$sql = "SELECT * FROM orderdetails JOIN items ON orderdetails.item_id=items.id JOIN orders ON orders.voucherno=orderdetails.voucherno WHERE orders.id=:id";
									$stmt=$conn->prepare($sql);
									$stmt->bindParam(':id',$id);
									$stmt->execute();
									$orderdetails = $stmt->fetchAll();
									// var_dump($orderdetails); die();
									foreach ($orderdetails as $orderdetail) {
										$qty = $orderdetail['qty'];
										$name = $orderdetail['name'];
										$codeno = $orderdetail['codeno'];
										$description = $orderdetail['description'];
										$unitprice = $orderdetail['price'];
										$discount = $orderdetail['discount'];

										if($discount){
											$price = $discount;
										} else {
											$price = $unitprice;
										}

										$subtotal = $price * $qty;

										?>
										<tr>
											<td><?=$qty ?></td>
											<td><?=$name ?></td>
											<td><?="YT_".$codeno ?></td>
											<td><?=$description ?></td>
											<td><?=$price."MMK" ?></td>
											<td><?=$subtotal."MMK" ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row d-print-none mt-2">
						<div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
					</div>
				</section>
			</div>
		</div>
	</div>
</main>

<?php 

include("BackEnd_Footer.php");


?>