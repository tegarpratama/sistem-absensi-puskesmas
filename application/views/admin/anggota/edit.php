<h2 class="mb-4">Edit Anggota</h2>

<form action="<?= base_url('anggota/edit/' . $user['id_users'] ) ?>" method="POST">
	<input type="hidden" name="id" value="<?= $user['id_users'] ?>">

	<div class="form-group row">
		<label for="no_employee" class="col-sm-2 col-form-label">No Karyawan</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="no_employee" id="no_employee" value="<?= $user['no_employee'] ?>">
			<?= form_error('no_employee', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label">Nama</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
			<?= form_error('name', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label">Jenis Kelamin</label>
		<div class="col-sm-6">
			<select name="gender" class="form-control">
				<option value="L" <?php if($user['gender'] == "L"){ print ' selected'; }?>>Laki-laki</option>
				<option value="P" <?php if($user['gender'] == "P"){ print ' selected'; }?>>Perempuan</option>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="position" class="col-sm-2 col-form-label">Bagian</label>
		<div class="col-sm-6">
		<select name="position_id" class="form-control">
			<?php foreach($position as $p) : ?>
				<option value="<?= $p['id_positions'] ?>" <?php if($user['position_id'] == $p['id_positions']){ print ' selected'; }?>><?= $p['position_name'] ?></option>
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
