<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow">
	 <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('name') ?></span>
		<?php if(($this->session->userdata('photo'))) :  ?>
			<img class="img-profile rounded-circle" src="<?= base_url('image/' . $this->session->userdata('photo')) ?>">
		<?php else : ?>
			<img class="img-profile rounded-circle" src="<?= base_url('image/default.png') ?>">
		<?php endif ?>
	 </a>
		<!-- Dropdown - User Information -->
		<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
		<?php if($this->session->userdata('role_id') == 1) : ?>
			<a class="dropdown-item" href="<?= base_url('admin/profile') ?>">
				<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
				Profile
			</a>
			<a class="dropdown-item" href="<?= base_url('admin/change_password') ?>">
				<i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
				Ubah Password
			</a>
		<?php else : ?>
			<a class="dropdown-item" href="<?= base_url('user/profile') ?>">
				<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
				Profile
			</a>
			<a class="dropdown-item" href="<?= base_url('user/change_password') ?>">
				<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
				Ubah Password
			</a>
		<?php endif ?>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
			<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
			Logout
		</a>
		</div>
  </li>

</ul>

</nav>
