<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg-6">
			<?php if (validation_errors()) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>
				</div>
			<?php endif; ?>

			<?= $this->session->flashdata('message'); ?>
			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal"><i class="fas fa-plus-square"></i> Role</a>
			<table class="table table-dark">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Role</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($role as $r) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $r['role']; ?></td>
							<td>
								<a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-success"><i class="fas fa-lock"></i> Akses</a>
								<a href="<?= base_url(); ?>admin/hapusRole/<?= $r['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ?');"><i class="fa fa-times"></i> Hapus</a>
							</td>
						</tr>
						<?php $i++ ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newRoleModalLabel">Tambah Role Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('admin/role'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="formGroupExampleInput"></label>
						<input type="text" class="form-control" id="role" name="role" placeholder="Nama Role" autocomplete="off">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>