<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php

use App\Models\modelCart;

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
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3"><?= $account['name']; ?></h5>
                        <p class="text-muted mb-1"><?= $account['type']; ?></p>
                        <div class="d-flex justify-content-center mb-2">
                            <a class="btn btn-primary" href="<?= base_url('/signin'); ?>">Sign Out</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Username</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $account['username']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Type</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $account['type']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Created</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $account['created_at']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>