<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800"><?= htmlspecialchars($title); ?></h1>
	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>

	<h3>A. Data Pribadi</h3>
	<table class="table table-dark">
		<tr>
			<th width="20%">No Kartu Keluarga</th>
			<td width="1%">:</td>
			<td><?= htmlspecialchars($keluarga['no_kk']); ?></td>
		</tr>
		<?php
		if (is_array($warga)) {
			$kepala_keluarga = array_filter($warga, function ($k) use ($keluarga) {
				return isset($keluarga['id_kepala_kk']) && $k['id'] == $keluarga['id_kepala_kk'];
			});
		} else {
			$kepala_keluarga = [];
		}
		?>
		<?php foreach ($kepala_keluarga as $k) : ?>
			<tr>
				<th>Kepala Keluarga</th>
				<td>:</td>
				<td><?= htmlspecialchars($k['nama']); ?></td>
			</tr>
			<tr>
				<th>NIK Kepala Keluarga</th>
				<td>:</td>
				<td><?= htmlspecialchars($k['nik']); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

	<h3>B. Data Alamat</h3>
	<table class="table table-dark">
		<tr>
			<th width="20%">Alamat</th>
			<td width="1%">:</td>
			<td><?= htmlspecialchars($keluarga['alamat_kk']); ?></td>
		</tr>
		<tr>
			<th>RT</th>
			<td>:</td>
			<td><?= htmlspecialchars($keluarga['rt_kk']); ?></td>
		</tr>
		<tr>
			<th>RW</th>
			<td>:</td>
			<td><?= htmlspecialchars($keluarga['rw_kk']); ?></td>
		</tr>
		<tr>
			<th>Desa/Kelurahan</th>
			<td>:</td>
			<td><?= htmlspecialchars($keluarga['desa_kelurahan_kk']); ?></td>
		</tr>
		<tr>
			<th>Kecamatan</th>
			<td>:</td>
			<td><?= htmlspecialchars($keluarga['kec_kk']); ?></td>
		</tr>
		<tr>
			<th>Kabupaten/Kota</th>
			<td>:</td>
			<td><?= htmlspecialchars($keluarga['kab_kk']); ?></td>
		</tr>
		<tr>
			<th>Provinsi</th>
			<td>:</td>
			<td><?= htmlspecialchars($keluarga['prov_kk']); ?></td>
		</tr>
		<tr>
			<th>Negara</th>
			<td>:</td>
			<td><?= htmlspecialchars($keluarga['negara_kk']); ?></td>
		</tr>
		<tr>
			<th>Kode Pos</th>
			<td>:</td>
			<td><?= htmlspecialchars($keluarga['kode_pos_kk']); ?></td>
		</tr>
	</table>

	<h3>C. Anggota Keluarga</h3>
	<table class="table table-dark" id="datatable">
		<thead>
			<tr align="center">
				<th>No</th>
				<th>NIK</th>
				<th>Nama Warga</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Pendidikan</th>
				<th>Pekerjaan</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $nomor = 1; ?>
			<?php foreach ($anggota_keluarga as $dw) : ?>
				<tr align="center">
					<td><?= $nomor++; ?></td>
					<td><?= htmlspecialchars($dw['nik']); ?></td>
					<td><?= htmlspecialchars($dw['nama']); ?></td>
					<td><?= htmlspecialchars($dw['tempat_lahir']); ?></td>
					<td><?= date('d-m-Y', strtotime($dw['tanggal_lahir'])); ?></td>
					<td><?= htmlspecialchars($dw['pendidikan_terakhir']); ?></td>
					<td><?= htmlspecialchars($dw['pekerjaan']); ?></td>
					<td><?= htmlspecialchars($dw['status_perkawinan']); ?></td>
					<td>
						<div class="dropdown">
							<button class="btn-white dropdown-toggle"></button>
							<div class="dropdown-content">
								<a href="<?= base_url('penduduk/detail/' . $dw['id']); ?>"><i class="fa fa-eye mr-2"></i>Detail</a>
							</div>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<div class="button mt-4 text-center">
		<a href="<?= base_url('penduduk/kk'); ?>" class="btn btn-primary btn-sm">Kembali</a>
	</div>
</div>