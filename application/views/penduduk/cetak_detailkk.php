<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Cetak</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		@media print {
			body {
				font-family: Arial, sans-serif;
			}
		}

		.header {
			display: flex;
			align-items: center;
			justify-content: center;
			margin-bottom: 20px;
		}

		.header img {
			max-height: 110px;
			margin-right: 30px;
			margin-left: 30px;
		}

		.img1 {
			max-height: 110px;
			margin-right: 30px;
			margin-left: 30px;
			opacity: 0;
		}

		.header h2 {
			margin: 0;
			font-weight: bolder;
		}

		.header h3 {
			margin: 0;
			font-weight: bolder;
		}

		.header h4 {
			margin: 0;
			font-weight: bolder;
		}

		.header p {
			margin: 0;
			font-style: italic;
		}

		.header-line {
			width: 100%;
			border-top: 2px solid black;
			margin-top: 10px;
			padding-bottom: 20px;
		}

		.table thead th,
		.table tbody td {
			font-size: 12px;
		}
	</style>
</head>

<body onload="window.print()">
	<div class="container-fluid" align="center">
		<div class="header">
			<img src="<?= base_url('assets/img/bgk.png'); ?>" alt="Logo">
			<div>
				<h2>PEMERINTAH KABUPATEN MALUKU TENGAH</h2>
				<h3>KECAMATAN SERAM UTARA</h3>
				<h4>DESA ADMINISTRATIF PARIGI</h4>
				<p>Jln. Lintas Seram - Kode Pos (97557)</p>
			</div>
			<img class="img1" src="<?= base_url('assets/img/bgk.png'); ?>" alt="Logo">
		</div>
		<div class="header-line mb-4"></div>
		<h3>Data Pribadi</h3>
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

		<h3>Data Alamat</h3>
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

		<h3>Anggota Keluarga</h3>
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
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
</body>

</html>