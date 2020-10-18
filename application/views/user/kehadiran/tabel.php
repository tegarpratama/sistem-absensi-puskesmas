<h2>Tabel Kehadiran</h2>

<p class="mt-4">Kehadiran Bulan : <?= date('F') ?></p>
<table class="table text-center">
	<thead>
		<tr>
			<th>No</th>
			<th>Tgl/Bln/Thn</th>
			<th>Jam</th>
			<th>Keterangan</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		<?php foreach($absensi as $a) : ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $a['date'] ?></td>
				<td><?= $a['time'] ?></td>
				<td><?= $a['information'] ?></td>
				<td>
					<?php if($a['status'] == 0) : ?>
						<div class="badge badge-secondary">Menunggu Konfirmasi</div>
					<?php elseif($a['status'] == 1) : ?>
						<div class="badge badge-success">Dikonfirmasi</div>
					<?php else : ?>
						<div class="badge badge-danger">Ditolak</div>
					<?php endif ?>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
