<?php
require 'dbconnect.php';
include("BackEnd_Header.php");

$sql = "SELECT items.*, brands.name as brandName FROM items JOIN brands ON brands.id = items.brand_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$items = $stmt->fetchAll();

?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Items List</h1>
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
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($items as $item) {
                                    $id = $item['id'];
                                    $code = $item['codeno'];
                                    $name = $item['name'];
                                    $photo = $item['photo'];
                                    $Uprice = $item['price'];
                                    $Dprice = $item['discount'];
                                    $description = $item['description'];
                                    $BrandName = $item['brandName'];
                                ?>
                                    <tr>
                                        <td><?php echo $i++ ?> </td>
                                        <td> <img src="<?= $photo ?>" class="img-fluid float-left" width="25" height="40">
                                            <?= "YT_" . $code ?>
                                            <p class="text-truncate"><?= $name ?></p>
                                        </td>
                                        <td><?= $BrandName ?></td>
                                        <td> <?= $Dprice . "MMK" . "<br>" ?> <del><?= $Uprice . "MMK" ?></del> </td>
                                        <td>
                                            <a href="itemdetail.php?id=<?= $id ?>" class="btn btn-primary">
                                                <i class="icofont-info"></i></i>
                                            </a>
                                            <a href="itemedit.php?id=<?= $id ?>" class="btn btn-warning">
                                                <i class="icofont-ui-settings"></i>
                                            </a>

                                            <a href="itemdelete.php?id=<?= $id ?>" class="btn btn-outline-danger">
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