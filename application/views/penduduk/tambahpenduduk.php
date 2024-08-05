<div class="container">
	<div class="card o-hidden border-0 shadow-lg my-5 col-lg mx-auto">
		<div class="card-body p-0">
			<div class="row">
				<div class="col-lg">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Tambah Data Warga</h1>
						</div>
						<form method="post" action="<?= base_url('penduduk/tambahpenduduk'); ?>" enctype="multipart/form-data">
							<h3>A. Data Pribadi</h3>
							<table class="table table-striped table-middle">
								<tr>
									<th width="20%">NIK</th>
									<td width="1%">:</td>
									<td><input type="text" class="form-control" id="nik" name="nik" value="<?= set_value('nik'); ?>" autocomplete="off">
										<?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Nama Warga</th>
									<td>:</td>
									<td><input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" autocomplete="off">
										<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Tempat Lahir</th>
									<td>:</td>
									<td><input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= set_value('tempat_lahir'); ?>" autocomplete="off">
										<?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Tanggal Lahir</th>
									<td>:</td>
									<td><input type="date" id="tanggal_lahir" name="tanggal_lahir">
										<?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Jenis Kelamin</th>
									<td>:</td>
									<td>
										<select class="form-control selectpicker" name="jenis_kelamin" id="jenis_kelamin">
											<option value="" selected disabled>- pilih -</option>
											<option value="L">Laki-laki</option>
											<option value="P">Perempuan</option>
										</select>
										<?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
									</td>
								</tr>
							</table>

							<h3>B. Data Alamat</h3>
							<table class="table table-striped table-middle">
								<tr>
									<th width="20%">Alamat KTP</th>
									<td width="1%">:</td>
									<td><textarea class="form-control" name="alamat_ktp" id="alamat_ktp"></textarea>
										<?= form_error('alamat_ktp', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Alamat</th>
									<td>:</td>
									<td><textarea class="form-control" name="alamat_warga" id="alamat_warga"></textarea>
										<?= form_error('alamat_warga', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Desa/Kelurahan</th>
									<td>:</td>
									<td><input type="text" class="form-control" id="desa_kelurahan" name="desa_kelurahan" value="<?= set_value('desa_kelurahan'); ?>" autocomplete="off">
										<?= form_error('desa_kelurahan', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Kecamatan</th>
									<td>:</td>
									<td><input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= set_value('kecamatan'); ?>" autocomplete="off">
										<?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Kabupaten/Kota</th>
									<td>:</td>
									<td><input type="text" class="form-control" id="kabupaten" name="kabupaten" value="<?= set_value('kabupaten'); ?>" autocomplete="off">
										<?= form_error('kabupaten', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Provinsi</th>
									<td>:</td>
									<td><input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= set_value('provinsi'); ?>" autocomplete="off">
										<?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Negara</th>
									<td>:</td>
									<td><input type="text" class="form-control" id="negara" name="negara" value="<?= set_value('negara'); ?>" autocomplete="off">
										<?= form_error('negara', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>RT</th>
									<td>:</td>
									<td><input type="text" class="form-control" id="rt" name="rt" value="<?= set_value('rt'); ?>" autocomplete="off">
										<?= form_error('rt', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>RW</th>
									<td>:</td>
									<td><input type="text" class="form-control" id="rw" name="rw" value="<?= set_value('rw'); ?>" autocomplete="off">
										<?= form_error('rw', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
							</table>

							<h3>C. Data Lain-lain</h3>
							<table class="table table-striped table-middle">
								<tr>
									<th width="20%">Agama</th>
									<td width="1%">:</td>
									<td>
										<select class="form-control selectlive" name="agama" id="agama">
											<option value="" selected disabled>- pilih -</option>
											<option value="Islam">Islam</option>
											<option value="Kristen">Kristen</option>
											<option value="Katholik">Katholik</option>
											<option value="Hindu">Hindu</option>
											<option value="Budha">Budha</option>
											<option value="Kong Hu Chu">Kong Hu Chu</option>
										</select>
										<?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
									</td>
								</tr>
								<tr>
									<th>Pendidikan Terakhir</th>
									<td>:</td>
									<td>
										<select class="form-control selectlive" name="pendidikan_terakhir" id="pendidikan_terakhir">
											<option value="" selected disabled>- pilih -</option>
											<option value="Tidak Sekolah">Tidak Sekolah</option>
											<option value="Tidak Tamat SD">Tidak Tamat SD</option>
											<option value="SD">SD</option>
											<option value="SMP">SMP</option>
											<option value="SMA">SMA</option>
											<option value="D1">D1</option>
											<option value="D2">D2</option>
											<option value="D3">D3</option>
											<option value="S1">S1</option>
											<option value="S2">S2</option>
											<option value="S3">S3</option>
										</select>
										<?= form_error('pendidikan_terakhir', '<small class="text-danger pl-3">', '</small>'); ?>
									</td>
								</tr>
								<tr>
									<th>Pekerjaan</th>
									<td>:</td>
									<td><input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= set_value('pekerjaan'); ?>" autocomplete="off">
										<?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Status Perkawinan</th>
									<td>:</td>
									<td>
										<select class="form-control selectpicker" name="status_perkawinan" id="status_perkawinan">
											<option value="" selected disabled>- pilih -</option>
											<option value="Menikah">Menikah</option>
											<option value="Belum Menikah">Belum Menikah</option>
										</select>
									</td>
								</tr>
							</table>
							<div class="button mb-3 text-center">
								<a href="<?= base_url('penduduk'); ?>" class="btn btn-primary btn-sm">Kembali</a>
								<button type="submit" class="btn btn-success btn-sm">
									<i class="fa fa-save"></i> Simpan
								</button>
							</div>
						</form>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>