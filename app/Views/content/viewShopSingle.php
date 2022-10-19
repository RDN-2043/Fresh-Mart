<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<script>
    var qty = 0;

    function BtnQuantityIncrease() {
        qty++;

        document.getElementById('quantity').value = qty;
    }

    function BtnQuantityDecrease() {
        qty--;

        document.getElementById('quantity').value = qty;
    }
</script>
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="<?= $product['imgLink']; ?>" alt="Card image cap" id="product-detail">
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2"><?= $product['title']; ?></h1>
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
                                <p class="text-muted"><strong><?= $product['seller']; ?></strong></p>
                            </li>
                        </ul>

                        <h6>Description:</h6>
                        <p><?= $product['description']; ?></p>

                        <form action="" method="GET">
                            <input type="hidden" name="product-title" value="Activewear">
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Quantity
                                            <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                        </li>
                                        <li class="list-inline-item"><button onclick="BtnQuantityDecrease();" class="btn btn-success">-</button></li>
                                        <li class="list-inline-item"><input class="badge bg-secondary" id="quantity" type="text" name="quantity" value="0">0</input></li>
                                        <li class="list-inline-item"><button onclick="BtnQuantityIncrease();" class="btn btn-success">+</button></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                                </div>
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Add To Cart</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->

<?= $this->endSection(); ?>

<!-- Start Slider Script -->
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
<!-- End Slider Script -->