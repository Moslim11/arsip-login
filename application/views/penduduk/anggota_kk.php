<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Responsive Details</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		/* CSS untuk responsive design */
		@media (max-width: 1200px) {

			.table th,
			.table td {
				font-size: 14px;
			}

			.h1,
			.h3 {
				font-size: 1.5rem;
			}

			.btn {
				font-size: 0.875rem;
			}
		}

		@media (max-width: 992px) {

			.table th,
			.table td {
				font-size: 12px;
			}

			.h1,
			.h3 {
				font-size: 1.25rem;
			}

			.btn {
				font-size: 0.75rem;
			}
		}

		@media (max-width: 768px) {

			.table th,
			.table td {
				font-size: 10px;
			}

			.h1,
			.h3 {
				font-size: 1rem;
			}

			.btn {
				font-size: 0.625rem;
			}
		}

		@media (max-width: 576px) {

			.table th,
			.table td {
				font-size: 8px;
			}

			.h1,
			.h3 {
				font-size: 0.875rem;
			}

			.btn {
				font-size: 0.5rem;
			}
		}

		/* CSS untuk dropdown */
		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f1f1f1;
			min-width: 160px;
			z-index: 1;
			left: 100%;
			transform: translateX(-100%);
		}

		.dropdown-content a {
			color: black;
			padding: 10px 14px;
			text-decoration: none;
			display: block;
		}

		.dropdown-content a:hover {
			background-color: grey;
		}

		.dropdown:hover .dropdown-content {
			display: block;
		}

		.dropdown {
			position: relative;
			display: inline-block;
		}

		.dropdown-content {
			font-size: 0.75rem;
			text-align: left;
		}

		.table thead th,
		.table tbody td {
			font-size: 12px;
		}

		.custom-select-container {
			position: relative;
		}

		#searchBox {
			margin-bottom: 10px;
		}
	</style>
</head>

<body>
	<div class="container-fluid">
		<h1 class="h3 mb-4 text-gray-800"><?= htmlspecialchars($title); ?></h1>
		<div class="row">
			<div class="col-lg-6">
				<?= $this->session->flashdata('message'); ?>
			</div>
		</div>
		<?php foreach ($keluarga as $w) : ?>
			<h3>A. Data Pribadi</h3>
			<table class="table table-dark">
				<tr>
					<th width="20%">No Kartu Keluarga</th>
					<td width="1%">:</td>
					<td><?= htmlspecialchars($w['no_kk']); ?></td>
				</tr>
				<?php
				if (is_array($warga)) {
					$kepala_keluarga = array_filter($warga, function ($k) use ($w) {
						return isset($w['id_kepala_kk']) && $k['id'] == $w['id_kepala_kk'];
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
			<form method="post" action="<?= base_url('penduduk/anggota_kk/' . $w['id_kk']); ?>" enctype="multipart/form-data">
				<h3>B. Anggota Keluarga</h3>
				<table class="table table-striped table-middle">
					<tr>
						<th width="20%">Anggota Keluarga</th>
						<td width="1%">:</td>
						<td>
							<div class="custom-select-container">
								<input type="text" id="searchBox" class="form-control" placeholder="Cari anggota keluarga...">
								<select class="form-control selectlive" name="anggota_keluarga" id="anggotaKeluargaSelect" required>
									<option value="" selected disabled>- pilih -</option>
									<?php foreach ($data_warga as $warga) : ?>
										<option value="<?php echo $warga['id']; ?>">
											<?php echo htmlspecialchars($warga['nama']); ?> (NIK: <?php echo htmlspecialchars($warga['nik']); ?>)
										</option>
									<?php endforeach; ?>
								</select>
								<?= form_error('anggota_keluarga', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</td>
					</tr>
				</table>

				<table class="table table-striped table-middle">
					<tr>
						<td colspan="3" align="center">
							<button type="submit" class="btn btn-success btn-sm">
								<i class="fa fa-plus-square"></i> Tambah Anggota Keluarga
							</button>
						</td>
					</tr>
				</table>
			</form>
			<table class="table table-dark" id="datatable">
				<thead>
					<tr align="center">
						<th>No</th>
						<th>NIK</th>
						<th>Nama Warga</th>
						<th>Tempat Lahir</th>
						<th>Tangga Lahir</th>
						<th>Pendidikan</th>
						<th>Pekerjaan</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor = 1; ?>
					<?php foreach ($warga_dalam_kk as $dw) : ?>
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
										<a href="<?= base_url('penduduk/hapusWarga/' . $dw['id']); ?>"><i class="fa fa-trash mr-2"></i> Hapus</a>
									</div>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<div class="button mb-4 text-center">
				<a href="<?= base_url('penduduk/kk'); ?>" class="btn btn-primary btn-sm">Kembali</a>
			</div>
		<?php endforeach; ?>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var searchBox = document.getElementById("searchBox");
			var select = document.getElementById("anggotaKeluargaSelect");

			searchBox.addEventListener("keyup", function() {
				var filter = searchBox.value.toUpperCase();
				var options = select.getElementsByTagName("option");

				for (var i = 0; i < options.length; i++) {
					var txtValue = options[i].textContent || options[i].innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
						options[i].style.display = "";
					} else {
						options[i].style.display = "none";
					}
				}
			});
		});
	</script>
</body>

</html>