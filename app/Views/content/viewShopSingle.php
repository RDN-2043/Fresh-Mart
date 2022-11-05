<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php

use App\Models\modelAccount;

$modelAccount = new modelAccount();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['account'])) {
    $account = $_SESSION['account'];
}

?>

<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="<?= $product['imgLink']; ?>" alt="Card image cap" id="product-detail">
                </div>
            </div>
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2"><?= $product['title']; ?></h1>
                        <p>Stock : <?= $product['available']; ?></p>
                        <p class="h3 py-2">Rp.<?= $product['price']; ?></p>
                        <p class="py-2">
                            <?php
                            $star = $product['star'] - 1;
                            for ($i = 0; $i < 5; $i++) {
                                if ($star < $i) {
                                    echo "<i class='text-muted fa fa-star'></i>";
                                } else {
                                    echo "<i class='text-warning fa fa-star'></i>";
                                }
                            }
                            ?>
                            <span class="list-inline-item text-dark">Rating : <?= $product['star']; ?></span>
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Seller :</h6>
                            </li>
                            <li class="list-inline-item">
                                <?php
                                $name = $modelAccount->where('id', $product['id_seller'])->first()['name'];
                                ?>
                                <p class="text-muted"><strong><?= $name; ?></strong></p>
                            </li>
                        </ul>
                        <h6>Description:</h6>
                        <p><?= $product['description']; ?></p>
                        <form action="<?= base_url('addToCart'); ?>" method="post">
                            <input type="hidden" name="product-title" value="Activewear">
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <input type="hidden" name="id_product" value="<?= $product['id']; ?>">
                                        <br>
                                        <li class="list-inline-item text-right">
                                            Quantity
                                        </li>
                                        <li class="list-inline-item"><input type="number" name="quantity" class="form-control input-number" value="1" min="1" max="<?= $product['available']; ?>"></li>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <?php
                                    if (!empty($account)) {
                                        if ($account['type'] == "Customer") {
                                            echo "<button type='submit' class='btn btn-success btn-lg' name='submit'>Add To Cart</button>";
                                        } else if ($account['type'] == "Seller") {
                                            echo "<a class='btn btn-success btn-lg' href='/profile'>Change To Customer Account</a>";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>

<script src="/assets/js/slick.min.js"></script>
<script>
    $('#carousel-related-product').slick({
        infinite: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 3,
        dots: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            }
        ]
    });
</script>