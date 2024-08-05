<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= htmlspecialchars($title); ?></h1>

	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>

	<?php foreach ($warga as $w) : ?>
		<h3>A. Data Pribadi</h3>
		<table class="table table-dark">
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
		</table>

		<h3>B. Data Alamat</h3>
		<table class="table table-dark">
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
		</table>

		<h3>C. Data Lain-lain</h3>
		<table class="table table-dark">
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

		<h3>D. Data Aplikasi</h3>
		<table class="table table-dark">
			<tr>
				<th width="20%">Diperbaharui</th>
				<td width="1%">:</td>
				<td><?= htmlspecialchars($w['input']); ?></td>
			</tr>
			<tr>
				<th width="20%">Diinput</th>
				<td width="1%">:</td>
				<td><?= htmlspecialchars($w['perbarui']); ?></td>
			</tr>
		</table>
	<?php endforeach; ?>
</div>