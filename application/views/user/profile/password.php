<h2 class="mb-4">Ubah Password</h2>

<form action="<?= base_url('user/change_password') ?>" method="post">

	<div class="form-group row">
		<label for="new_password" class="col-sm-2 col-form-label">Password Baru</label>
		<div class="col-sm-6">
			<input type="password" class="form-control" name="new_password">
			<?= form_error('new_password', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="form-group row">
		<label for="password_confirm" class="col-sm-2 col-form-label">Konfirmasi Password</label>
		<div class="col-sm-6">
			<input type="password" class="form-control" name="password_confirm">
			<?= form_error('password_confirm', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col-8">
			<button type="submit" class="btn btn-sm btn-primary float-right"><i class="fas fa-check mr-1"></i> Simpan</button>
		</div>
	</div>
</form>
