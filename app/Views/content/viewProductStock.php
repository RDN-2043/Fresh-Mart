<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php

use App\Models\modelAccount;
use App\Models\modelProduct;
use App\Models\modelShipped;

$modelProduct = new modelProduct();
$modelAccount = new modelAccount();
$modelShipped = new modelShipped();

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (isset($_SESSION['account'])) {
  $account = $_SESSION['account'];
}

?>
<br>
<div class="d-flex justify-content-end">
  <a class="btn btn-success btn-rounded" href="<?= base_url('addproduct'); ?>">+Add New Product</a>
</div>
<br>
<div class="table-responsive">
  <table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
      <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Description</th>
        <th>Type</th>
        <th>Available</th>
        <th>Star</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (!empty($listCartProduct)) :
        foreach ($listCartProduct as $cart) :
      ?>
          <tr>
            <td>
              <img src="<?= $cart['imgLink']; ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
            </td>
            <td>
              <p class="fw-normal mb-1"><?= $cart['title']; ?></p>
            </td>
            <td>
              <p class="fw-normal mb-1"><?= $cart['description']; ?></p>
            </td>
            <td>
              <p class="fw-normal mb-1"><?= $cart['type']; ?></p>
            </td>
            <td>
              <p class="fw-normal mb-1"><?= $cart['available']; ?></p>
            </td>
            <td>
              <p class="fw-normal mb-1"><?= $cart['star']; ?></p>
            </td>
            <td>
              <p class="fw-normal mb-1">Rp.<?= $cart['price']; ?></p>
            </td>
            <td>
              <a class="btn btn-success btn-rounded" href="<?= base_url('updateProduct/' . $cart['id']); ?>">
                Update
              </a>
            </td>
          </tr>
      <?php
        endforeach;
      endif;
      ?>
    </tbody>
  </table>
</div>
<?= $this->endSection(); ?>