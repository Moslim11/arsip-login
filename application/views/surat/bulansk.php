<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-5 text-gray-800"><?= $title; ?></h1>

	<!-- Tampilan Daftar Bulan -->
	<div class="row">
		<div class="col-lg-10">

			<?php foreach ($months as $month) : ?>
				<a href="<?= site_url('surat/showSuratByMonth1/' . $tahun . '/' . $month['bulan']); ?>" class="btn btn-warning mr-3"><?= date("F", mktime(0, 0, 0, $month['bulan'], 1)) ?></a>
			<?php endforeach; ?>

		</div>
	</div>



</div>

</div>