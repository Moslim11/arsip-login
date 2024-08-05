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
		<table class="table table-dark table-condensed table-hover" border="1">
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
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				<?php foreach ($warga as $w) : ?>
					<?php
					$tanggal_lahir = $w['tanggal_lahir'];
					if ($tanggal_lahir != '0000-00-00') {
						$tanggal_hari_ini = date('Y-m-d');
						$usia = date_diff(date_create($tanggal_lahir), date_create($tanggal_hari_ini))->y;
					} else {
						$usia = '';
					}
					?>
					<tr align="center">
						<th scope="row"><?= $i; ?></th>
						<td><?= $w['nik']; ?></td>
						<td><?= $w['nama']; ?></td>
						<td><?= $w['jenis_kelamin']; ?></td>
						<td><?= $usia ?></td>
						<td><?= $w['pendidikan_terakhir']; ?></td>
						<td><?= $w['pekerjaan']; ?></td>
						<td><?= $w['status_perkawinan']; ?></td>
					</tr>
					<?php $i++ ?>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>

</html>