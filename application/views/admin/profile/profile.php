<h2 class="mb-4">Biodata Saya</h2>

<form action="<?= base_url('admin/profile') ?>" method="post">

	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label">Nama</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="name" name="name" value="<?= $admin['name'] ?>" readonly>
		</div>
	</div>

	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-6">
			<input type="email" class="form-control" id="email" name="email" value="<?= $admin['email'] ?>">
		</div>
	</div>

	<div class="form-group row">
		<label for="position" class="col-sm-2 col-form-label">Bagian</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="position_id" id="position_id" value="Administrator" readonly>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col-8">
			<button type="submit" class="btn btn-sm btn-primary float-right"><i class="fas fa-check mr-1"></i> Simpan</button>
		</div>
	</div>
</form>
