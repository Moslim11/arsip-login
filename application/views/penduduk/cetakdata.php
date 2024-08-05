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

		.header h2,
		.header h3,
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
		<div class="header-line"></div>
		<h6 class="h3 mt-4 mb-4 text-gray-800">DATA WARGA</h6>
		<?php foreach ($warga as $w) : ?>
			<table class="table table-dark table-condensed table-hover">
				<tr>
					<th width="20%">NIK</th>
					<td width="1%">:</td>
					<td><?= htmlspecialchars($w['nik']); ?></td>
				</tr>
				<tr>
					<th>Nama Warga</th>
					<td>:</td>
					<td><?= htmlspecialchars($w['nama']); ?></td>
				</tr>
				<tr>
					<th>Tempat Lahir</th>
					<td>:</td>
					<td><?= htmlspecialchars($w['tempat_lahir']); ?></td>
				</tr>
				<tr>
					<th>Tanggal Lahir</th>
					<td>:</td>
					<td><?= date('d-m-Y', strtotime($w['tanggal_lahir'])); ?></td>
				</tr>
				<tr>
					<th>Jenis Kelamin</th>
					<td>:</td>
					<td><?= htmlspecialchars($w['jenis_kelamin']); ?></td>
				</tr>
				<tr>
					<th width="20%">Alamat KTP</th>
					<td width="1%">:</td>
					<td><?= htmlspecialchars($w['alamat_ktp']); ?></td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td>:</td>
					<td><?= htmlspecialchars($w['alamat_warga']); ?></td>
				</tr>
				<tr>
					<th>Desa/Kelurahan</th>
					<td>:</td>
					<td><?= htmlspecialchars($w['desa_kelurahan']); ?></td>
				</tr>
				<tr>
					<th>Kecamatan</th>
					<td>:</td>
					<td><?= htmlspecialchars($w['kecamatan']); ?></td>
				</tr>
				<tr>
					<th>Kabupaten/Kota</th>
					<td>:</td>
					<td><?= htmlspecialchars($w['kabupaten']); ?></td>
				</tr>
				<tr>
					<th>Provinsi</th>
					<td>:</td>
					<td><?= htmlspecialchars($w['provinsi']); ?></td>
				</tr>
				<tr>
					<th>Negara</th>
					<td>:</td>
					<td><?= htmlspecialchars($w['negara']); ?></td>
				</tr>
				<tr>
					<th>RT</th>
					<td>:</td>
					<td><?= htmlspecialchars($w['rt']); ?></td>
				</tr>
				<tr>
					<th>RW</th>
					<td>:</td>
					<td><?= htmlspecialchars($w['rw']); ?></td>
				</tr>
				<tr>
					<th width="20%">Agama</th>
					<td width="1%">:</td>
					<td><?= htmlspecialchars($w['agama']); ?></td>
				</tr>
				<tr>
					<th>Pendidikan</th>
					<td>:</td>
					<td><?= htmlspecialchars($w['pendidikan_terakhir']); ?></td>
				</tr>
				<tr>
					<th>Pekerjaan</th>
					<td>:</td>
					<td><?= htmlspecialchars($w['pekerjaan']); ?></td>
				</tr>
				<tr>
					<th>Status Perkawinan</th>
					<td>:</td>
					<td><?= htmlspecialchars($w['status_perkawinan']); ?></td>
				</tr>
			</table>
		<?php endforeach; ?>
	</div>
</body>

</html>