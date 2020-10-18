<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user') ?>">
		<div class="sidebar-brand-icon">
			<i class="fas fa-hospital"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Absensi Puskesmas</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<li class="nav-item text-center mt-3">
		<?php if(($this->session->userdata('photo'))) :  ?>
			<img src="<?= base_url('image/' . $this->session->userdata('photo')) ?>" class=" rounded-circle" style="height:100px; width:100px">
		<?php else : ?>
			<img src="<?= base_url('image/default.png') ?>" class="img-thumbnail rounded-circle" style="height:100px; width:100px">
		<?php endif ?>
	</li>

	<li class="nav-item mt-2">
		<a class="nav-link" href="<?= base_url('user/profile') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Profile</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-users"></i>
			<span>Kehadiran</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('absensi/entri') ?>">Enti Kehadiran</a>
				<a class="collapse-item" href="<?= base_url('absensi/tabel') ?>">Tabel Kehadiran</a>
				<a class="collapse-item" href="<?= base_url('absensi/rekap') ?>">Rekap Kehadiran</a>
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
