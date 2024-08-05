<style>
	@media (max-width: 576px) {

		.table-responsive .table th,
		.table-responsive .table td {
			font-size: 12px;
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
		<div class="col-lg-6">
			<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<?= $this->session->flashdata('message'); ?>
			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal"><i class="fas fa-plus-square"></i> Menu</a>
			<div class="table-responsive">
				<table class="table table-dark">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Menu</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($menu as $m) : ?>
							<tr>
								<th scope="row"><?= $i; ?></th>
								<td><?= $m['menu']; ?></td>
								<td>
									<a href="<?= base_url(); ?>menu/editMenu/<?= $m['id']; ?>" class="badge badge-success"><i class="fa fa-edit"></i> Edit</a>
									<a href="<?= base_url(); ?>menu/hapus/<?= $m['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ?');"><i class="fa fa-times"></i> Delete</a>
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
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newMenuModalLabel">Tambah Menu</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('menu'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="formGroupExampleInput">Nama Menu</label>
						<input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu" autocomplete="off">
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
