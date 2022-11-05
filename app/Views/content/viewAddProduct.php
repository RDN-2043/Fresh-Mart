<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php

use App\Models\modelProduct;

$modelProduct = new modelProduct();

$title = "";
$price = "";
$qty = "";
$desc = "";
$type = "Fresh";
$img = "";

if (!empty($productId)) {
    $product = $modelProduct->where('id', $productId)->first();

    $title = $product['title'];
    $price = $product['price'];
    $qty = $product['available'];
    $desc = $product['description'];
    $type = $product['type'];
    $img = $product['imgLink'];
}
?>

<section class="vh-100" style="background-color: #2779e2;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">
                <h1 class="text-white mb-4">New Product</h1>
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
                        <form action="<?= base_url('addnewproduct'); ?>" method="post">
                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Title</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" class="form-control form-control-lg" name="title" value="<?= $title; ?>" />
                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Price (Rp)</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="number" class="form-control form-control-lg" name="price" value="<?= $price; ?>" />
                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Quantity</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="number" class="form-control form-control-lg" name="qty" value="<?= $qty; ?>" />
                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Description</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" class="form-control form-control-lg" name="desc" value="<?= $desc; ?>" />
                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Type</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <select class="form-select" aria-label="Default select example" name="type">
                                        <option value='Fresh' <?php if ($type == "Fresh") echo "selected" ?>>Fresh</option>
                                        <option value='Cooked' <?php if ($type == "Cooked") echo "selected" ?>>Cooked</option>
                                        <option value='Side' <?php if ($type == "Side") echo "selected" ?>>Side</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Image Link</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" class="form-control form-control-lg" name="imgLink" value="<?= $img; ?>" />
                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="px-5 py-4">
                                <button type="submit" class="btn btn-primary btn-lg">Add product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>