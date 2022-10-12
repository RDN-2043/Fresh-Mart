<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <?php
        $i = 0;
        foreach ($listBannerProduct as $product) :
        ?>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" <?php if ($i++ == 0) echo "class='active'" ?>> </li>
        <?php endforeach;  ?>
    </ol>
    <div class="carousel-inner">
        <?php
        $i = 0;
        foreach ($listBannerProduct as $product) :
        ?>
            <div class="carousel-item <?php if ($i++ == 0) echo "active" ?>">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="<?= $product['imgLink']; ?>" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-dark"><b><?= $product['title']; ?></b></h1>
                                <p>
                                    <?= $product['description']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;  ?>
    </div>
    <?php if (!empty($listBannerProduct)) : ?>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    <?php endif;  ?>
</div>
<!-- End Banner Hero -->


<!-- Start Produk Terlaris -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Produk Terlaris</h1>
            <p>
                Dibawah ini Merupakan Contoh Produk Terlaris dari kami.
            </p>
        </div>
    </div>
    <div class="row">
        <?php foreach ($listBestProduct as $product) : ?>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="<?= $product['imgLink']; ?>" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3"><?= $product['title']; ?></h5>
                <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
            </div>
        <?php endforeach;  ?>
    </div>
</section>
<!-- End Categories of The Month -->


<!-- Start Deskripsi Makanan -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Deskripsi Makanan</h1>
                <p>
                    Cita rasa yang kami punya dan yang kami miliki.
                </p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($listRandomProduct as $product) : ?>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="<?= $product['imgLink']; ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <?php
                                    for($i = 0; $i < 5; $i++){
                                        if($i < $product['star']){
                                            echo "<i class='text-warning fa fa-star'></i>";
                                        }else{
                                            echo "<i class='text-muted fa fa-star'></i>";
                                        }
                                    }
                                    ?>
                                </li>
                                <li class="text-muted text-right">Rp. <?= $product['price']; ?></li>
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark"><?= $product['title']; ?></a>
                            <p class="card-text">
                                <?= $product['description']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach;  ?>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>