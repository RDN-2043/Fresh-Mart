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
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="./assets/img/banner_img_01.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-dark"><b></b> Kol</h1>
                            <p>
                                Sayuran ini termasuk dalam genus Brassica, yang berarti bahwa kol terkait dengan brokoli, kembang kol dan kangkung. Genus sayuran ini memiliki bentuk dan warna yang berbeda (merah, ungu, putih dan hijau) dengan daun keriput atau halus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="./assets/img/banner_img_02.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Timun</h1>
                            <p>
                                Daerah asal tanaman mentimun adalah benua Asia. Para ahli botani menyebutkan bahwa mentimun berasal dari lereng gunung Himalaya dan India. Pasalnya, di daerah tersebut ditemukan sumber genetik (plasma nutfah) jenis mentimun liar Cucumis hardwichii Royle.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="./assets/img/banner_img_03.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Kangkung</h1>
                            <p>
                                Kangkung Berasal dari India yang kemudian menyebar ke Malaysia, Burma, Indonesia, China Selatan Australia dan bagian negara Afrika. Kangkung termasuk suku Convolvulaceae (keluarga kangkung-kangkungan). Kangkung merupakan tanaman yang tumbuh cepat yang memberikan hasil dalam waktu 4- 6 minggu sejak dari benih.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
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
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="#"><img src="./assets/img/category_img_01.jpg" class="rounded-circle img-fluid border"></a>
            <h5 class="text-center mt-3 mb-3">Sawi</h5>
            <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
        </div>
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="#"><img src="./assets/img/category_img_02.jpg" class="rounded-circle img-fluid border"></a>
            <h2 class="h5 text-center mt-3 mb-3">Rendang</h2>
            <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
        </div>
        <div class="col-12 col-md-4 p-5 mt-3">
            <a href="#"><img src="./assets/img/category_img_03.jpg" class="rounded-circle img-fluid border"></a>
            <h2 class="h5 text-center mt-3 mb-3">Sayur Asem</h2>
            <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
        </div>
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
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="shop-single.html">
                        <img src="./assets/img/feature_prod_01.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                            <li class="text-muted text-right">$240.00</li>
                        </ul>
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">Sayur Asem</a>
                        <p class="card-text">
                        Sayur Asem ini memiliki ciri khas pedas yang nendang. Cabai merah atau cabai rawit menjadi dominan dalam bumbunya. Jadi rasa asam bercampur dengan pedas yang mencolok.
                        </p>
                        <p class="text-muted">Reviews (24)</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="shop-single.html">
                        <img src="./assets/img/feature_prod_02.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                            <li class="text-muted text-right">$480.00</li>
                        </ul>
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">Jagung Manis</a>
                        <p class="card-text">
                        Jagung manis adalah tanaman yang usianya di bawah 6 bulan sehingga sering juga disebut sebagai tanaman semusim.
                        Dia termasuk tanaman yang memiliki proses penggunaan sinar matahari yang efisien sehingga banyak ahli yang menelitinya.  Dalam bahasa kerennya adalah tanaman C4.
                        </p>
                        <p class="text-muted">Reviews (48)</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="shop-single.html">
                        <img src="./assets/img/feature_prod_03.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                            </li>
                            <li class="text-muted text-right">$360.00</li>
                        </ul>
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">Opor Ayam</a>
                        <p class="card-text">
                        Opor ayam kuning ini memang berwarna kuning menyerupai soto. Pembedanya adalah bumbu santan dalam opor ayam bumbu kuning terlihat lebih kental seperti gulai daripada opor ayam. Walaupun begitu, kamu bisa mengatur tingkat kepedasannya sehingga tidak sama dengan gulai ayam.
                        </p>
                        <p class="text-muted">Reviews (74)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>