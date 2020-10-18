<h2 class="mb-4">Biodata Saya</h2>

<?php if($this->session->flashdata('message')) : ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('message') ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif ?>

<?= form_open_multipart(base_url('user/profile')) ?>
	<input type="hidden" name="id" value="<?= $user['id_users'] ?>">

	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label">Nama</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
			<?= form_error('name', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-6">
			<input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
			<?= form_error('email', '<small class="text-danger mt-1">', '</small>'); ?>
		</div>
	</div>

	<div class="form-group row">
		<label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
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
			<select name="position_id" class="form-control" readonly>
				<?php foreach($position as $p) : ?>
					<option value="<?= $p['id_positions'] ?>" <?php if($user['position_id'] == $p['id_positions']){ print ' selected'; }?>><?= $p['position_name'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>

	<div class="form-group row">
		<label for="photo" class="col-sm-2 col-form-label">Foto</label>
		<div class="col-sm-6">
			<?php if(!empty($user['photo'])) : ?>
				<img src="<?= base_url('image/'. $user['photo']) ?>" height="150">
			<?php else: ?>
				<p>No Photo</p>
			<?php endif; ?>
			<br> 
			<small><span class="text-danger">*</span>	Maksimal ukuran gambar adalah 3 MB</small>
			<br> <br>
			<input name="photo" type="file" class="form-control-file">
			<?php if($this->session->flashdata('image_error')) :  ?>
				<small class="form-text text-danger">
					<?= $this->session->flashdata('image_error') ?>
				</small>
			<?php endif ?>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col-8">
			<button type="submit" class="btn btn-sm btn-primary float-right"><i class="fas fa-check mr-1"></i> Simpan</button>
		</div>
	</div>
<?= form_close() ?>
