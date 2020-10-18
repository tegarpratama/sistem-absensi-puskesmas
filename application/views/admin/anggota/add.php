<h2 class="mb-4">Tambah Anggota</h2>

<form action="<?= base_url('anggota/add') ?>" method="post">
	<div class="form-group row">
		<label for="no_employee" class="col-sm-2 col-form-label">No Karyawan</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="no_employee" id="no_employee" >
			<small>No karyawan harus 18 digit.</small>
			<?= form_error('no_employee', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label">Nama</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="name" name="name">
			<?= form_error('name', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-6">
			<input type="email" class="form-control" id="email" name="email">
			<?= form_error('email', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="form-group row">
		<label for="password" class="col-sm-2 col-form-label">Password</label>
		<div class="col-sm-6">
			<input type="password" class="form-control" id="password" name="password">
			<?= form_error('password', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label">Jenis Kelamin</label>
		<div class="col-sm-6">
			<select name="gender" class="form-control">
				<option value="L">Laki-laki</option>
				<option value="P">Perempuan</option>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="position" class="col-sm-2 col-form-label">Bagian</label>
		<div class="col-sm-6">
		<select name="position_id" class="form-control">
			<?php foreach($position as $p) : ?>
				<option value="<?= $p['id_positions'] ?>"><?= $p['position_name'] ?></option>
			<?php endforeach ?>
		</select>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col-8">
			<button type="submit" class="btn btn-sm btn-primary float-right"><i class="fas fa-check mr-1"></i> Simpan</button>
		</div>
	</div>
</form>
