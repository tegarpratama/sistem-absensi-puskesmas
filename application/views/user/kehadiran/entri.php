<?php if($this->session->flashdata('message')) : ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('message') ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif ?>

<form action="" method="POST">

	<div class="card">
		<h5 class="card-header">Entri Kehadiran</h5>
		<div class="card-body">	
			<div class="form-group row">
				<label for="time" class="col-sm-2 col-form-label">Jam</label>
				<div class="col-sm-6">
					<?php date_default_timezone_set('Asia/Jakarta'); ?>
					<input type="text" class="form-control-plaintext" name="time" value="<?= date('H:i') ?>">
				</div>
			</div>

			<div class="form-group row">
				<label for="date" class="col-sm-2 col-form-label">Tgl/Bln/Thn</label>
				<div class="col-sm-6">
					<?php date_default_timezone_set('Asia/Jakarta'); ?>
					<input type="text" class="form-control-plaintext" name="date" value="<?= date('d-M-Y') ?>">
				</div>
			</div>

			<div class="form-group row">
				<label for="information" class="col-sm-2 col-form-label">Tgl/Bln/Thn</label>
				<div class="col-sm-6">
					<a href="<?= base_url('absensi/masuk') ?>" class="btn btn-success mr-3">Masuk</a>
					<a href="<?= base_url('absensi/ijin') ?>" class="btn btn-warning text-light mr-3">Ijin</a>
					<a href="<?= base_url('absensi/sakit') ?>" class="btn btn-danger mr-3">Sakit</a>
				</div>
			</div>
		</div>
	</div>
	
</form>

