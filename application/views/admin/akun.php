<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<?php if (empty($users)) : ?>
		<div class="alert alert-danger" role="alert">
			Data user tidak ditemukan.
		</div>
	<?php endif; ?>
	<a href="<?= base_url('admin/registration'); ?>" class="btn btn-primary mb-2"><i class="fas fa-plus-square"></i> Akun Baru</a>
	<?= $this->session->flashdata('message'); ?>
	<div class="row mt-3">
		<div class="col-md-4">
			<form action="" method="post">
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Cari data ..." name="keyword">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-10">
			<div class="table-responsive">
				<table class="table table-dark">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Nama</th>
							<th scope="col">Email</th>
							<th scope="col">Keterangan</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($users as $ua) : ?>
							<tr>
								<th scope="row"><?= $i; ?></th>
								<td><?= $ua['name']; ?></td>
								<td><?= $ua['email']; ?></td>
								<td><?= $ua['role']; ?></td>
								<td>
									<a href="<?= base_url(); ?>admin/editakun/<?= $ua['id']; ?>" class="badge badge-success"><i class="fa fa-edit"></i> Ubah</a>
									<a href="<?= base_url(); ?>admin/hapus/<?= $ua['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ?');"><i class="fa fa-times"></i> Hapus</a>
								</td>
							</tr>
							<?php $i++; ?>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>