<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-5 text-gray-800"><?= $title; ?></h1>
	<?php if ($this->session->flashdata('message')) : ?>
		<div class="col-md-5 mb-2 alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px; margin-bottom: 0; padding:0;">
			<?= $this->session->flashdata('message'); ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>

	<div class="col-md-3 mb-4">
		<div class="card border-left-danger shadow h-100 py-2 row">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-md font-weight-bold text-primary text-uppercase mb-1">
							Total Surat Keluar</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalSuratKeluar; ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-envelope-open-text fa-2x text-black-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a href="<?= base_url('surat/tambahsk'); ?>" class="btn btn-primary mb-4"><i class="fas fa-plus-square"></i> Surat Keluar</a>
	<!-- Tampilan Daftar Tahun -->
	<div class="row">
		<div class="col-lg-10">
			<?php foreach ($years as $year) : ?>
				<a href="<?= site_url('surat/showSuratByYear1/' . $year['tahun']); ?>" class="btn btn-warning mr-3 mb-3"><?= $year['tahun']; ?></a>
			<?php endforeach; ?>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
