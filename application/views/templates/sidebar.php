<!-- Sidebar -->
<style>
	.nav-link span {
		font-family: 'Cambria';
		font-size: large;
	}

	.nav-submenu {
		background-color: #343a40;
	}

	.nav-submenu:hover {
		background-color: #6c757d;
	}
</style>
<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center">
		<div class="sidebar-brand-icon row mr-1 ml-1">
			<img src="<?= base_url('assets/img/bgk.png'); ?>" width="45">
		</div>
		<div class="sidebar-brand-text">DESA ADMINISTRATIF PARIGI</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- QUERY MENU -->
	<?php
	$role_id = $this->session->userdata('role_id');
	$queryMenu = "SELECT `user_menu`.`id`, `menu` 
	FROM `user_menu` JOIN `user_access_menu` 
	ON `user_menu`.`id` = `user_access_menu`.`menu_id` 
	WHERE `user_access_menu`.`role_id` = $role_id 
	ORDER BY `user_access_menu`.`menu_id` ASC";

	$menu = $this->db->query($queryMenu)->result_array();
	?>

	<!-- LOOPING MENU -->
	<?php foreach ($menu as $m) : ?>
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#submenu<?= $m['id']; ?>" aria-expanded="true" aria-controls="submenu">
				<span>
					<?= $m['menu']; ?>
				</span>
			</a>
			<div id="submenu<?= $m['id']; ?>" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<ul class="nav row">
					<!-- SIAPKAN SUB-MENU SESUAI MENU -->
					<?php
					$menuId = $m['id'];
					$querySubMenu = "SELECT * 
					FROM `user_sub_menu` JOIN `user_menu` 
					ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
					WHERE `user_sub_menu`.`menu_id` = $menuId 
					AND `user_sub_menu`.`is_active` = 1";
					$subMenu = $this->db->query($querySubMenu)->result_array();
					?>
					<?php foreach ($subMenu as $sm) : ?>
						<?php if ($title == $sm['title']) : ?>
							<li class="nav-submenu active">
							<?php else : ?>
							<li class="nav-submenu">
							<?php endif; ?>
							<a class="nav-link" href="<?= base_url($sm['url']); ?>">
								<i class="<?= $sm['icon']; ?>"></i>
								<span><?= $sm['title']; ?></span>
							</a>
							</li>
						<?php endforeach; ?>
				</ul>
			</div>
		</li>
	<?php endforeach; ?>

	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('auth/logout'); ?>">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span>Logout</span>
		</a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggleTop">
			<i class="fas fa-chevron-left"></i>
			<i class="fas fa-chevron-right"></i>
		</button>
	</div>

</ul>
