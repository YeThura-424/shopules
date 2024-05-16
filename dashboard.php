<?php 
require 'dbconnect.php';
include("BackEnd_Header.php");
?>
<main class="app-content">
	<div class="app-title">
		<div>
			<h1> <i class="icofont-list"></i> Today Orders</h1>
		</div>
		<ul class="app-breadcrumb breadcrumb side">
			<a href="itemnew.php" class="btn btn-outline-primary">
				<i class="icofont-plus"></i>
			</a>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">
					<div class="table-responsive">
						<table class="table table-hover table-bordered" id="sampleTable">
							<thead>
								<tr>
									<th>No.</th>
									<th>Date</th>
									<th>Product</th>
									<th>Serial</th>
									<th>Voucherno</th>
									<th>Description</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$sql = "SELECT * FROM orderdetails JOIN items ON orderdetails.item_id = items.id JOIN orders ON orders.voucherno = orderdetails.voucherno";
								$stmt = $conn->prepare($sql);
								$stmt->execute();
								$orderdetails = $stmt->fetchAll();
								$i = 1;
								foreach ($orderdetails as $orderdetail) {
									$date = date('Y-m-d');
									$orderdate = $orderdetail['orderdate'];
									$name = $orderdetail['name'];
									$codeno = $orderdetail['codeno'];
									$voucherno = $orderdetail['voucherno'];
									$description = $orderdetail['description'];
									if ($orderdate == $date) :
										?>
										<tr>
											<td><?=$i++ ?></td>
											<td><?=$orderdate ?></td>
											<td><?=$name ?></td>
											<td><?="YT_".$codeno ?></td>
											<td><?=$voucherno ?></td>
											<td><?=$description ?></td>
										</tr>
									<?php endif ?>
								<?php } ?>

								
								

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php 

include("BackEnd_Footer.php");


?> 