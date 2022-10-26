	<?= $this->extend('layout/template'); ?>

	<?= $this->section('content'); ?>
	<link rel="stylesheet" href="/public/css/viewSignIn.css">
	<section class="vh-100 gradient-form" style="background-color: #eee;">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-xl-10">
					<div class="card rounded-3 text-black">
						<div class="row g-0">
							<div class="col-lg-6">
								<div class="card-body p-md-5 mx-md-4">

									<div class="text-center mb-5">
										<img src="https://cdn.discordapp.com/attachments/776404266767745034/1032263055071002624/logo-freshmart.png" style="width: 185px;" alt="logo">
									</div>

									<form action="<?= base_url('signingin'); ?>" method="post">
										<p>Please login to your account</p>

										<div class="form-outline mb-4">
											<label class="form-label" for="form2Example11">Username</label>
											<input type="username" name="username" id="form2Example11" class="form-control" placeholder="Phone number or email address" />
										</div>

										<div class="form-outline mb-4">
											<label class="form-label" for="form2Example22">Password</label>
											<input type="password" name="password" id="form2Example22" class="form-control" />
										</div>

										<div class="form-outline mb-4">
											<button type="submit" class="btn btn-primary">Login</button>
										</div>
									</form>

									<div class="d-flex align-items-center justify-content-center pb-4">
										<p class="mb-0 me-2">Don't have an account?</p>
										<a class="btn btn-outline-danger" href="<?= base_url('signup'); ?>">Create new</a>
									</div>

								</div>
							</div>
							<div class="col-lg-6 d-flex align-items-center gradient-custom-2">
								<div class="text-black px-3 py-4 p-md-5 mx-md-4">
									<h1 class="mb-0">Selamat Datang</h1>
									
									<p class="small mb-0"></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?= $this->endSection(); ?>