<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="col-md-3 mb-4">
		<div class="card border-left-warning shadow h-100 py-3">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
							Jumlah Kartu Keluarga</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalkk; ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-users fa-2x text-black-300"></i>
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
	<a href="<?= base_url('penduduk/tambah_kk'); ?>" class="btn btn-primary mb-2 btn-sm">
		<i class="fas fa-plus-square"></i> Tambah Kartu Keluarga
	</a>
	<div class="row mb-3">
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
		<button onclick="window.open('<?= base_url('penduduk/cetakkk'); ?>')" class="btn btn-success btn-sm mb-1">
			<i class="fa fa-print"></i> Cetak
		</button>
	</div>
	<div class="table-responsive" style="overflow-y: auto; height: 400px;">
		<table class="table table-dark table-condensed table-hover" id="datatable">
			<thead>
				<tr align="center">
					<th>No</th>
					<th>Nomor KK</th>
					<th>Kepala Keluarga</th>
					<th>NIK Kepala</th>
					<th>Jumlah Anggota</th>
					<th>Alamat</th>
					<th>RT</th>
					<th>RW</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody id="wargaTable">
				<?php $i = 1; ?>
				<?php foreach ($kartu_keluarga as $kk) : ?>
					<tr align="center">
						<th scope="row"><?= $i; ?></th>
						<td><?= $kk['no_kk']; ?></td>
						<?php
						// Menampilkan data warga yang terkait dengan id_kk
						$warga_dalam_kk = array_filter($data_warga, function ($dw) use ($kk) {
							return $dw['id'] == $kk['id_kepala_kk'];
						});
						?>
						<?php foreach ($warga_dalam_kk as $dw) : ?>
							<td><?= $dw['nama']; ?></td>
							<td><?= $dw['nik']; ?></td>
						<?php endforeach; ?>
						<td><?= isset($jumlah_anggota[$kk['id_kk']]) ? $jumlah_anggota[$kk['id_kk']] : 0; ?></td>
						<td><?= $kk['alamat_kk']; ?></td>
						<td><?= $kk['rt_kk']; ?></td>
						<td><?= $kk['rw_kk']; ?></td>
						<td>
							<div class="dropdown">
								<button class="btn-white dropdown-toggle">
								</button>
								<div class="dropdown-content">
									<a href="<?= base_url('penduduk/detailkk/' . $kk['id_kk']); ?>"><i class="fa fa-eye mr-2"></i>Detail</a>
									<a href="<?= base_url('penduduk/anggota_kk/' . $kk['id_kk']); ?>"><i class="fa fa-users mr-2"></i> Anggota Keluarga</a>
									<a href="<?= base_url('penduduk/ubah_kk/' . $kk['id_kk']); ?>"><i class=" fa fa-edit mr-2"></i> Ubah</a>
									<a href="<?= base_url('penduduk/cetak_detailkk/' . $kk['id_kk']); ?>"><i class="fa fa-print mr-2"></i> Cetak</a>
									<a href="<?= base_url('penduduk/hapusDataKK/' . $kk['id_kk']); ?>"><i class="fa fa-trash mr-2"></i> Hapus</a>
								</div>
							</div>
						</td>
					</tr>
					<?php $i++ ?>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div>
		<?= $pagination; ?>
	</div>
</div>
