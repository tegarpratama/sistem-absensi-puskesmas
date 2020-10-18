<div class="row">
	<div class="col-6">
		<div class="card">
			<div class="card-header">
				<h4>Rekap Kehadiran</h4>
				Bulan : <?= date('F') ?>
			</div>
			<div class="card-body text-center">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Keterangan</th>
							<th>Jumlah</th>
						</tr>
						<tr>
							<td>Hadir</td>
							<td><?= $hadir ?></td>
						</tr>
						<tr>
							<td>Sakit</td>
							<td><?= $sakit ?></td>
						</tr>
						<tr>
							<td>Ijin</td>
							<td><?= $ijin ?></td>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>
