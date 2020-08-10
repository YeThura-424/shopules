<?php

require 'dbconnect.php';
include("BackEnd_Header.php");
$id = $_GET['id'];

$sql = "SELECT * FROM items WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

$item = $stmt->fetch(PDO::FETCH_ASSOC);

$name = $item['name'];
$codeno = $item['codeno'];
$price = $item['discount'];
$photo = $item['photo'];
$brand = $item['brand_id'];
$subcategory = $item['subcategory_id'];

?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Item Detail</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="itemlist.php" class="btn btn-outline-primary">
                <i class="icofont-double-left"></i>
            </a>
        </ul>
    </div>
    <div>
        <div class="card mb-3 container-fluid h-100">
            <h5 class="pt-4"><?= "YT_" . $codeno ?></h5>
            <p class="text-muted"><?= $name ?></p>
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= $photo ?>" class="card-img" height="350px;">
                </div>
                <div class="col-md-8">

                    <div class="card-body">
                        <?php

                        $sql = "SELECT * FROM brands WHERE id=:id";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':id', $brand);
                        $stmt->execute();
                        $brands = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <p>Brand :<?= $brands['name'] ?></p>
                        <?php

                        $sql = "SELECT * FROM subcategories WHERE id=:id";
                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':id', $subcategory);
                        $stmt->execute();
                        $subcategories = $stmt->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <p>Subcategory :<?= $subcategories['name'] ?> </p>

                        <p>Price : <span class="text-danger"><?= $price . "MMK" ?></span></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>







<?php

include("BackEnd_Footer.php");


?>