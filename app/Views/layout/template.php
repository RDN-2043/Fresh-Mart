<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fresh Mart - <?= $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="/assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/776404266767745034/1032263055071002624/logo-freshmart.png">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/templatemo.css">
    <link rel="stylesheet" href="/assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="/assets/css/fontawesome.min.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="/assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/slick-theme.css">
</head>

<body>
    <?php

    use App\Models\modelCart;
    use App\Models\modelProduct;
    use App\Models\modelShipped;

    $modelProduct = new modelProduct();
    $modelCart = new modelCart();
    $modelShipped = new modelShipped();
    $account = null;

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['account'])) {
        $account = $_SESSION['account'];
    }

    ?>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:fmart14@gmail.com">fmart14@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:082182091941">082182091941</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="<?= base_url('dashboard'); ?>">
                Fresh Mart
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('dashboard'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('about'); ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('shop'); ?>">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('contact'); ?>">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (!empty($account)) {
                        if ($account['type'] == 'Customer') {
                            $redirectTo = 'cart';
                        } else {
                            $redirectTo = 'stock/product';
                        }
                    } else {
                        $redirectTo = 'cart';
                    }
                    ?>
                    <a class="nav-icon position-relative text-decoration-none" href="<?= base_url($redirectTo); ?>">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <?php
                        echo "<span class='position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark'>";
                        if (!empty($account)) {
                            if ($account['type'] == "Customer") {
                                if (!empty($listCartProduct)) {
                                    echo count($listCartProduct);
                                }
                            } else if ($account['type'] == "Seller") {
                                if (!empty($listShippedProduct)) {
                                    echo count($listShippedProduct);
                                }
                            }
                        }
                        echo "</span>";
                        ?>
                    </a>
                    <?php
                    if (!empty($account)) {
                        if ($account['type'] == "Seller") {
                            echo "<a class='nav-icon position-relative text-decoration-none' href='/stock/transaction'><i class='fas fa-box'></i></a>";

                            echo "<span class='position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark'>";
                            if (!empty($listShippedProduct)) {
                                echo count($listShippedProduct);
                            }
                            echo "</span>";
                        }
                    }
                    ?>
                    <?php
                    if (empty($account)) {
                        $redirectTo = "signin";
                    } else {
                        $redirectTo = "profile";
                    }
                    ?>
                    <a class="nav-icon position-relative text-decoration-none" href="<?= base_url($redirectTo); ?>">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <?= $this->renderSection('content') ?>

    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Fresh Mart</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Gedong Air
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:082182091941">082182091941</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:fmart14@gmail.com">fmart14@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="<?= base_url('shop/Fresh'); ?>">Fresh Vegetable</a></li>
                        <li><a class="text-decoration-none" href="<?= base_url('shop/Cooked'); ?>">Cooked Vegetable</a></li>
                        <li><a class="text-decoration-none" href="<?= base_url('shop/Side'); ?>">Side Dishes</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li><a class="text-decoration-none" href="<?= base_url('about'); ?>">About Us</a></li>
                        <li><a class="text-decoration-none" href="<?= base_url('shop'); ?>">Shop</a></li>
                        <li><a class="text-decoration-none" href="<?= base_url('contact'); ?>">Contact</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="/assets/js/jquery-1.11.0.min.js"></script>
    <script src="/assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/templatemo.js"></script>
    <script src="/assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>