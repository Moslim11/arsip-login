<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<?php if (empty($surat)) : ?>
		<div class="alert alert-danger" role="alert">
			Data surat tidak ditemukan.
		</div>
	<?php endif; ?>
	<a href="<?= base_url('surat/tambahsk'); ?>" class="btn btn-primary"><i class="fas fa-plus-square"></i> Surat Keluar</a>
	<?= $this->session->flashdata('message'); ?>
	<div class="row mt-3">
		<div class="col-md-4">
			<form action="" method="post">
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Cari data surat ...." name="keyword">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-lg">
			<div class="table-responsive" style="overflow-y: auto; height: 400px;">
				<table class="table table-dark text-center">
					<thead>
						<tr>
							<th scope="col">No Surat</th>
							<th scope="col">Tanggal Surat</th>
							<th scope="col">Tujuan</th>
							<th scope="col">Penerima</th>
							<th scope="col">Perihal</th>
							<th scope="col">File Surat</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($surat as $ua) : ?>
							<tr>
								<td><?= $ua['nomor_surat']; ?></td>
								<td><?= $ua['tanggal_surat']; ?></td>
								<td><?= $ua['tujuan']; ?></td>
								<td><?= $ua['penerima']; ?></td>
								<td><?= $ua['perihal']; ?></td>
								<td><?= $ua['file_surat']; ?></td>
								<td>
									<div class="dropdown">
										<button class="btn-white dropdown-toggle">
										</button>
										<div class="dropdown-content">
											<a href="<?= base_url(); ?>surat/viewFile1/<?= $ua['id']; ?>"><i class="fa fa-eye mr-2"></i> Lihat</a>
											<a href="<?= base_url(); ?>surat/ubahsk/<?= $ua['id']; ?>"><i class="fa fa-edit mr-2"></i> Ubah</a>
											<a href="<?= base_url(); ?>surat/hapusDataSk/<?= $ua['id']; ?>" onclick="return confirm('Apakah anda yakin ?');"><i class="fa fa-trash mr-2"></i> Hapus</a>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>