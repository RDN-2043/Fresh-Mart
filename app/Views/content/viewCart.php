<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php

use App\Models\modelCart;
use App\Models\modelProduct;

$modelProduct = new modelProduct();
$modelCart = new modelCart();
$account = null;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['account'])) {
    $account = $_SESSION['account'];
}

if (!empty($account) && $account['type'] == "Customer") {
    $listCartProduct = $modelCart->where('id_customer', $account['id'])->findAll();
}

?>
<section class="vh-100">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <p><span class="h2">Shopping Cart </span><span class="h4">(
                        <?php
                        if (!empty($listCartProduct)) {
                            echo count($listCartProduct);
                        } else {
                            echo "0";
                        }
                        ?> item in your cart)</span></p>

                <div class="card mb-4">
                    <div class="card-body p-4">

                        <div class="row align-items-center">
                            <?php
                            $totalCartPrice = 0;

                            if (!empty($listCartProduct)) :
                                foreach ($listCartProduct as $productCart) :
                                    $product = $modelProduct->where('id', $productCart['id_product'])->first();
                                    $totalPrice = $product['price'] * $productCart['total'];
                                    $totalCartPrice = $totalCartPrice + $totalPrice;
                            ?>
                                    <div class="col-md-2">
                                        <img src="<?= $product['imgLink']; ?>" class="img-fluid" alt="Generic placeholder image">
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Title</p>
                                            <p class="lead fw-normal mb-0"><?= $product['title']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Seller</p>
                                            <p class="lead fw-normal mb-0"><?= $product['seller']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Quantity</p>
                                            <p class="lead fw-normal mb-0"><?= $productCart['total']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Price</p>
                                            <p class="lead fw-normal mb-0">Rp.<?= $product['price']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Total</p>
                                            <p class="lead fw-normal mb-0">Rp.<?= $totalPrice; ?></p>
                                        </div>
                                    </div>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </div>

                    </div>
                </div>

                <div class="card mb-5">
                    <div class="card-body p-4">

                        <div class="float-end">
                            <p class="mb-0 me-5 d-flex align-items-center">
                                <span class="small text-muted me-2">Order total:</span> <span class="lead fw-normal">Rp.<?= $totalCartPrice; ?></span>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <?php
                    if (empty($account)) {
                        $redirectTo = "signin";
                        $name = "Sign In to Continue Shoping";
                    } else {
                        $redirectTo = "shop";
                        $name = "Continue Shopping";
                    }
                    ?>
                    <a class="btn btn-light btn-lg me-2" href="<?= base_url($redirectTo); ?>"><?= $name; ?></a>

                    <?php if (!empty($listCartProduct)) : ?>
                        <a class="btn btn-primary btn-lg" href="">Buy</a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>