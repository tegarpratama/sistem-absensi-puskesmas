<h2 class="mb-4"><?= $title ?></h2>

<?php if($this->session->flashdata('message')) : ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<?= $this->session->flashdata('message') ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif ?>

<table class="table table-bordered text-center">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nama</th>
			<th scope="col">Bagian</th>
			<th scope="col">Hadir</th>
			<th scope="col">Sakit</th>
			<th scope="col">Ijin</th>
			<th scope="col">Total</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach($rekap as $r) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $r['name'] ?></td>
				<td><?= $r['position'] ?></td>
				<td><?= $r['M'] ?></td>
				<td><?= $r['S'] ?></td>
				<td><?= $r['I'] ?></td>
				<td><?= $r['total'] ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<a class="btn btn-success btn-sm mt-4" href="<?= base_url('kehadiran/cetak') ?>">Cetak Rekap</a>
