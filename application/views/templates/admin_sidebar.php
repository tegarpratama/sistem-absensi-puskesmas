<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
		<div class="sidebar-brand-icon">
			<i class="fas fa-hospital"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Absensi Puskesmas</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<li class="nav-item active">
		<a class="nav-link" href="<?= base_url('admin') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('anggota/add') ?>">
			<i class="fas fa-fw fa-user-plus"></i>
			<span>Tambah Anggota</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-users"></i>
			<span>Data Anggota</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('anggota/dokter') ?>">Dokter</a>
				<a class="collapse-item" href="<?= base_url('anggota/perawat') ?>">Perawat</a>
				<a class="collapse-item" href="<?= base_url('anggota/apoteker') ?>">Apoteker</a>
				<a class="collapse-item" href="<?= base_url('anggota/akuntan') ?>">Akuntan</a>
			</div>
		</div>
	</li>


	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kehadiran" aria-expanded="true" aria-controls="kehadiran">
			<i class="fas fa-fw fa-list"></i>
			<span>Kehadiran</span>
		</a>
		<div id="kehadiran" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('kehadiran/konfirmasi_kehadiran') ?>">Konfirmasi Kehadiran</a>
				<a class="collapse-item" href="<?= base_url('kehadiran/tabel_kehadiran') ?>">Tabel Kehadiran</a>
				<a class="collapse-item" href="<?= base_url('kehadiran/rekap_kehadiran') ?>">Rekap Kehadiran</a>
			</div>
		</div>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('auth/logout') ?>">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span>Keluar</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
