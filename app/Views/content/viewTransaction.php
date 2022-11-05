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
<?php
if ($type == "Product") :
?>
  <br>
  <div class="d-flex justify-content-end">
    <a class="btn btn-success btn-rounded" href="<?= base_url('addproduct'); ?>">+Add New Product</a>
  </div>
  <br>
<?php endif; ?>
<div class="table-responsive">
  <table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
      <tr>
        <th>Product</th>
        <th>Customer</th>
        <th>Date</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (!empty($listShippedProduct)) :
        foreach ($listShippedProduct as $cart) :
          $product = $modelProduct->where('id', $cart['id_product'])->first();
          $customer = $modelAccount->where('id', $cart['id_customer'])->first();
          $shipped = $modelShipped->where('id_cart', $cart['id'])->first();
          $price = $cart['total'] * $product['price'];
      ?>
          <tr class="table-warning">
            <td>
              <div class="d-flex align-items-center">
                <img src="<?= $product['imgLink']; ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                <div class="ms-3">
                  <p class="fw-bold mb-1"><?= $product['title']; ?></p>
                </div>
              </div>
            </td>
            <td>
              <p class="fw-normal mb-1"><?= $customer['name']; ?></p>
            </td>
            <td>
              <p class="fw-normal mb-1"><?= $shipped['created_at']; ?></p>
            </td>
            <td>
              <p class="fw-normal mb-1"><?= $cart['total']; ?></p>
            </td>
            <td>
              <p class="fw-normal mb-1"><?= $price; ?></p>
            </td>
            <td>
              <p class="fw-normal mb-1">Waiting</p>
            </td>
            <td>
              <a type="button" class="btn btn-success btn-rounded" href="<?= base_url('deliver/' . $shipped['id']); ?>">
                Deliver
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