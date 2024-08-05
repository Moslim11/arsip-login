<style>
	@media (max-width: 576px) {

		.table-responsive .table th,
		.table-responsive .table td {
			font-size: 8px;
		}

		.btn {
			font-size: 0.875rem;
		}

		.modal-dialog {
			margin: 0 10px;
		}

		.modal-content {
			font-size: 0.875rem;
		}
	}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg">
			<div class="table-responsive">
				<?php if (validation_errors()) : ?>
					<div class="alert alert-danger" role="alert">
						<?= validation_errors(); ?>
					</div>
				<?php endif; ?>

				<?= $this->session->flashdata('message'); ?>
				<a href="" class="btn btn-primary mb-3 btn-sm" data-toggle="modal" data-target="#newSubMenuModal"><i class="fas fa-plus-square"></i> Sub Menu</a>
				<table class="table table-dark">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Title</th>
							<th scope="col">Menu</th>
							<th scope="col">Url</th>
							<th scope="col">Icon</th>
							<th scope="col">Aktif</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($subMenu as $sm) : ?>
							<tr>
								<th scope="row"><?= $i; ?></th>
								<td><?= $sm['title']; ?></td>
								<td><?= $sm['menu']; ?></td>
								<td><?= $sm['url']; ?></td>
								<td><?= $sm['icon']; ?></td>
								<td><?= $sm['is_active']; ?></td>
								<td>
									<a href=" <?= base_url(); ?>menu/ubahSubmenu/<?= $sm['id']; ?>" class="badge badge-success"><i class="fa fa-edit"></i> Edit</a>
									<a href="<?= base_url(); ?>menu/subhapus/<?= $sm['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ?');"><i class="fa fa-times"></i> Delete</a>
								</td>
							</tr>
							<?php $i++ ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newSubMenuModalLabel">Tambah Sub Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('menu/submenu'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
					</div>
					<div class="form-group">
						<select name="menu_id" id="menu_id" class="form-control">
							<option value="">Select Menu</option>
							<?php foreach ($menu as $m) : ?>
								<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
							<label class="form-check-label" for="is_active">
								Active ?
							</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>
