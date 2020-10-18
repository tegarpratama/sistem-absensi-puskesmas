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
			<th scope="col">Tgl/Bln/Thn</th>
			<th scope="col">Bagian</th>
			<th scope="col">Keterangan</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach($absensi as $a) : ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $a['name'] ?></td>
				<td><?= $a['date'] ?></td>
				<td><?= $a['position_name'] ?></td>
				<td>
					<?php if($a['information'] == 'M') : ?>
						<div class="badge badge-success">Masuk</div>
					<?php elseif($a['information'] == 'I') : ?>
						<div class="badge badge-warning">Ijin</div>
					<?php else : ?>
						<div class="badge badge-danger">Sakit</div>
					<?php endif ?>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
	<tbody>
		
	</tbody>
</table>
