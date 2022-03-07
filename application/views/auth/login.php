<div class="row vh-100 justify-content-center align-items-center">
	<div class="col-lg-4 col-md-6 col-sm-9">
		<form class="card" action="<?= site_url('admin/auth/login') ?>" method="post" autocomplete="off">
			<div class="card-header bg-primary text-white">
				<h5 class="card-title">Login</h5>
			</div>
			<div class="card-body">
				<div class="mb-3">
					<label class="mb-1" for="username">Username</label>
					<input type="text" name="username" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" id="username" required>
					<div class="invalid-feedback">
						<?= isset($errors['username']) ? $errors['username'] : '' ?>
					</div>
				</div>

				<div class="mb-3">
					<label class="mb-1" for="password">Password</label>
					<input type="password" name="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" id="password" required>
					<div class="invalid-feedback">
						<?= isset($errors['password']) ? $errors['password'] : '' ?>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-end">
					<button class="btn btn-primary btn-block" type="submit">Masuk</button>
				</div>
			</div>
		</form>
	</div>
</div>