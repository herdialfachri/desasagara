<!doctype html>
<html lang="en">

<head>
	<title>Keuangan - Masuk</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="admin/css/style.css">

	<!-- Favicon  -->
	<link rel="icon" href="admin/images/logosmi.png">
</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-3">
					<h2 class="heading-section">Website Pengelola Keuangan PBB</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>
						<h3 class="text-center">Selamat Datang</h3>
						<p class="text-center mb-4">Silakan masuk untuk mendapatkan hak akses penuh</p>
						<?php if (session()->getFlashdata('msg')): ?>
							<div class="alert alert-danger">
								<?= session()->getFlashdata('msg'); ?>
							</div>
						<?php endif; ?>
						<form action="<?= base_url('login/auth') ?>" method="post" class="login-form">
							<div class="form-group">
								<input type="text" name="username" class="form-control rounded-left" placeholder="Username" required>
							</div>
							<div class="form-group d-flex">
								<input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
							</div>
							<div class="form-group">
								<button type="submit" class="form-control btn btn-primary rounded submit px-3">Masuk</button>
							</div>
							<div class="form-group">
								<button type="button" class="form-control btn btn-warning rounded px-3" onclick="window.history.back();">Kembali</button>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Ingat Saya
										<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Lupa Sandi?</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="admin/js/jquery.min.js"></script>
	<script src="admin/js/popper.js"></script>
	<script src="admin/js/bootstrap.min.js"></script>
	<script src="admin/js/main.js"></script>

</body>

</html>