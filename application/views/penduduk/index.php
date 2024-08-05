<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="row">
		<div class="col-md-4 mb-4">
			<div class="card border-left-warning shadow h-100 py-3">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Jumlah Penduduk</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalwarga; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-black-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 mb-4">
			<div class="card border-left-warning shadow h-100 py-3">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Jumlah Laki-Laki</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_laki_laki; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-male fa-2x text-black-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 mb-4">
			<div class="card border-left-warning shadow h-100 py-3">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Jumlah Perempuan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_perempuan; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-female fa-2x text-black-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<?php if ($this->session->flashdata('error')) : ?>
				<div class="alert alert-danger" role="alert">
					<?= $this->session->flashdata('error'); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<a href="<?= base_url('penduduk/tambahpenduduk'); ?>" class="btn btn-primary mb-2 btn-sm">
		<i class="fas fa-plus-square"></i> Tambah Warga
	</a>

	<div class="row mb-2">
		<div class="col-lg-6">
			<div class="input-group">
				<input type="text" id="searchInput" class="form-control" placeholder="Cari data warga...">
				<div class="input-group-append">
					<button class="btn btn-secondary" type="button" onclick="filterTable()">Cari</button>
				</div>
			</div>
		</div>
	</div>
	<div class="button mb-1 text-right">
		<button onclick="window.open('<?= base_url('penduduk/cetak'); ?>')" class="btn btn-success btn-sm mb-1">
			<i class="fa fa-print"></i> Cetak
		</button>
	</div>
	<div class="table-responsive" style="overflow-y: auto; height: 600px;">
		<table class="table mb-2 table-dark table-condensed table-hover" id="datatable">
			<thead>
				<tr align="center">
					<th>No</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>L/P</th>
					<th>Usia</th>
					<th>Pendidikan</th>
					<th>Pekerjaan</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody id="wargaTable">
				<?php $i = 1; ?>
				<?php foreach ($warga as $w) : ?>
					<tr align="center">
						<th scope="row"><?= $i; ?></th>
						<td><?= $w['nik']; ?></td>
						<td><?= $w['nama']; ?></td>
						<td><?= $w['jenis_kelamin']; ?></td>
						<td><?= $w['usia']; ?></td>
						<td><?= $w['pendidikan_terakhir']; ?></td>
						<td><?= $w['pekerjaan']; ?></td>
						<td><?= $w['status_perkawinan']; ?></td>
						<td>
							<div class="dropdown">
								<button class="btn-white dropdown-toggle">
								</button>
								<div class="dropdown-content">
									<a href="<?= base_url('penduduk/detail/' . $w['id']); ?>"><i class="fa fa-eye mr-2"></i>Detail</a>
									<a href="<?= base_url('penduduk/ubahdata/' . $w['id']); ?>"><i class="fa fa-edit mr-2"></i> Ubah</a>
									<a href="<?= base_url('penduduk/cetakdata/' . $w['id']); ?>"><i class="fa fa-print mr-2"></i> Cetak</a>
									<a href="<?= base_url('penduduk/hapusDataWarga/' . $w['id']); ?>"><i class="fa fa-trash mr-2"></i> Hapus</a>
								</div>
							</div>
						</td>
					</tr>
					<?php $i++ ?>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="halaman">
			<?= $pagination; ?>
		</div>
		<div class="col-lg-3">
			<table class="table table-striped table-condensed table-hover" border="4">
				<tr>
					<td align="center" colspan="3" class="bg-primary"><strong>KETERANGAN</strong></td>
				</tr>
				<tr>
					<td><strong>Balita</strong></td>
					<td><strong>:</strong></td>
					<td><strong><?= $usia05; ?></strong></td>
				</tr>
				<tr>
					<td><strong>Penduduk Usia <17 </strong>
					</td>
					<td><strong>:</strong></td>
					<td><strong><?= $usia016; ?></strong></td>
				</tr>
				<tr>
					<td><strong>Penduduk Usia >17 </strong>
					</td>
					<td><strong>:</strong></td>
					<td><strong><?= $usia17100; ?></strong></td>
				</tr>
			</table>
		</div>
	</div>
</div>
