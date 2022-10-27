<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<section class="vh-100" style="background-color: #2779e2;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-9">
                <h1 class="text-white mb-4">New Product</h1>
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body">
                        <form action="<?= base_url('addnewproduct'); ?>" method="post">
                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Title</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" class="form-control form-control-lg" name="title"/>
                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Price (Rp)</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="number" class="form-control form-control-lg" name="price"/>
                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Quantity</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="number" class="form-control form-control-lg" name="qty"/>
                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Description</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" class="form-control form-control-lg" name="desc"/>
                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Type</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <select class="form-select" aria-label="Default select example" name="type">
                                        <option value="Fresh">Fresh</option>
                                        <option value="Cooked">Cooked</option>
                                        <option value="Side">Side</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="row align-items-center py-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Image Link</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="text" class="form-control form-control-lg" name="imgLink"/>
                                </div>
                            </div>
                            <hr class="mx-n3">
                            <div class="px-5 py-4">
                                <button type="submit" class="btn btn-primary btn-lg">Add product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>