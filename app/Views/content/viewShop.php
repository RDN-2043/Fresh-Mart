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

<div class="container py-5">
    <div class="row">
        <div class="row">
            <?php
            foreach ($listProduct as $product) :
                if(!empty($type)){
                    if($product['type'] != $type){
                        continue;
                    }
                }
            ?>
                <div class="col-md-4">
                    <div class="card mb-4 product-wap rounded-0">
                        <div class="card rounded-0">
                            <div class="align-self-center" style="height: 200px; width: 200px;">
                                <img class="card-img rounded-0" src=<?= $product['imgLink']; ?>>
                            </div>
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white mt-2" href="<?= base_url('shop-single/' . $product['id']); ?>"><i class="far fa-eye"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="<?= base_url('shop-single/' . $product['id']); ?>" class="h3 text-decoration-none"><?= $product['title']; ?></a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li>Available : <?= $product['available']; ?></li>
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
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
                                </li>
                            </ul>
                            <p class="text-center mb-0">Rp.<?= $product['price']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>