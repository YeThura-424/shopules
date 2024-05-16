<?php 
require 'dbconnect.php';
include("BackEnd_Header.php");
$sql = "SELECT * FROM users WHERE role_id != 1 and status = 0";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();
// var_dump($users);
?>

<main class="app-content">
	<div class="app-title">
		<div>
			<h1> <i class="icofont-list"></i>Customers List</h1>
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
									<th>No</th>
									<th>Name</th>
									<th>Email</th>
									<th>Address</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								foreach ($users as $user) {
									$name = $user['name'];
									$email = $user['email'];
									$address = $user['address'];
									$status = $user['status'];
									$id = $user['id'];

									if ($status == 0) {
										$status = "Active";
									}

									?>
									<tr>
										<td><?=$i++ ?></td>
										<td><?=$name ?></td>
										<td><?=$email ?></td>
										<td><?=$address ?></td>
										<td><?=$status ?></td>

										<td>
											<a href="customerupdate.php?id=<?= $id ?>" class="btn btn-outline-danger">
												<i class="icofont-close"></i>
											</a>

										</td>

									</tr>
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