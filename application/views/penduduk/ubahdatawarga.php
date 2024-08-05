	<div class="container">
		<div class="card o-hidden border-0 shadow-lg my-5 col-lg mx-auto">
			<div class="card-body p-0">
				<div class="row">
					<div class="col-lg">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4">Ubah Data Warga</h1>
							</div>
							<form method="post" action="<?= base_url('penduduk/ubahdata/' . $warga['id']); ?>" enctype="multipart/form-data">
								<h3>A. Data Pribadi</h3>
								<table class="table table-striped table-middle">
									<tr>
										<th width="20%">NIK</th>
										<td width="1%">:</td>
										<td><input type="text" class="form-control" id="nik" name="nik" value="<?= htmlspecialchars($warga['nik']); ?>" autocomplete="off">
											<?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?></td>
									</tr>
									<tr>
										<th>Nama Warga</th>
										<td>:</td>
										<td><input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($warga['nama']); ?>" autocomplete="off">
											<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?></td>
									</tr>
									<tr>
										<th>Tempat Lahir</th>
										<td>:</td>
										<td><input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= htmlspecialchars($warga['tempat_lahir']); ?>" autocomplete="off">
											<?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?></td>
									</tr>
									<tr>
										<th>Tanggal Lahir</th>
										<td>:</td>
										<td>
											<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= date('Y-m-d', strtotime($warga['tanggal_lahir'])); ?>" autocomplete="off">
											<?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
										</td>
									</tr>
									<tr>
										<th>Jenis Kelamin</th>
										<td>:</td>
										<td>
											<select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
												<option value="L" <?= ($warga['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
												<option value="P" <?= ($warga['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
											</select>
										</td>
									</tr>
								</table>

								<h3>B. Data Alamat</h3>
								<table class="table table-striped table-middle">
									<tr>
										<th width="20%">Alamat KTP</th>
										<td width="1%">:</td>
										<td><input type="text" class="form-control" id="alamat_ktp" name="alamat_ktp" value="<?= htmlspecialchars($warga['alamat_ktp']); ?>" autocomplete="off">
											<?= form_error('alamat_ktp', '<small class="text-danger pl-3">', '</small>'); ?></td>
									</tr>
									<tr>
										<th width="20%">Alamat</th>
										<td width="1%">:</td>
										<td><input type="text" class="form-control" id="alamat_warga" name="alamat_warga" value="<?= htmlspecialchars($warga['alamat_warga']); ?>" autocomplete="off">
											<?= form_error('alamat_warga', '<small class="text-danger pl-3">', '</small>'); ?></td>
									</tr>
									<tr>
										<th width="20%">Desa/Kelurahan</th>
										<td width="1%">:</td>
										<td><input type="text" class="form-control" id="desa_kelurahan" name="desa_kelurahan" value="<?= htmlspecialchars($warga['desa_kelurahan']); ?>" autocomplete="off">
											<?= form_error('desa_kelurahan', '<small class="text-danger pl-3">', '</small>'); ?></td>
									</tr>
									<tr>
										<th width="20%">Kecamatan</th>
										<td width="1%">:</td>
										<td><input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= htmlspecialchars($warga['kecamatan']); ?>" autocomplete="off">
											<?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?></td>
									</tr>
									<tr>
										<th width="20%">Kabupaten/Kota</th>
										<td width="1%">:</td>
										<td><input type="text" class="form-control" id="kabupaten" name="kabupaten" value="<?= htmlspecialchars($warga['kabupaten']); ?>" autocomplete="off">
											<?= form_error('kabupaten', '<small class="text-danger pl-3">', '</small>'); ?></td>
									</tr>
									<tr>
										<th width="20%">Provinsi</th>
										<td width="1%">:</td>
										<td><input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= htmlspecialchars($warga['provinsi']); ?>" autocomplete="off">
											<?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?></td>
									</tr>
									<tr>
										<th width="20%">Negara</th>
										<td width="1%">:</td>
										<td><input type="text" class="form-control" id="negara" name="negara" value="<?= htmlspecialchars($warga['negara']); ?>" autocomplete="off">
											<?= form_error('negara', '<small class="text-danger pl-3">', '</small>'); ?></td>
									</tr>
									<tr>
										<th width="20%">RT</th>
										<td width="1%">:</td>
										<td><input type="text" class="form-control" id="rt" name="rt" value="<?= htmlspecialchars($warga['rt']); ?>" autocomplete="off">
											<?= form_error('rt', '<small class="text-danger pl-3">', '</small>'); ?></td>
									</tr>
									<tr>
										<th width="20%">RW
										</th>
										<td width="1%">:</td>
										<td><input type="text" class="form-control" id="rw" name="rw" value="<?= htmlspecialchars($warga['rw']); ?>" autocomplete="off">
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
												<option value="Islam" <?= ($warga['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
												<option value="Kristen" <?= ($warga['agama'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
												<option value="Katholik" <?= ($warga['agama'] == 'Katholik') ? 'selected' : ''; ?>>Katholik</option>
												<option value="Hindu" <?= ($warga['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
												<option value="Budha" <?= ($warga['agama'] == 'Budha') ? 'selected' : ''; ?>>Budha</option>
												<option value="Kong Hu Chu" <?= ($warga['agama'] == 'Kong Hu Chu') ? 'selected' : ''; ?>>Kong Hu Chu</option>
											</select>
											<?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
										</td>
									</tr>
									<tr>
										<th>Pendidikan Terakhir</th>
										<td>:</td>
										<td>
											<select class="form-control selectlive" name="pendidikan_terakhir" id="pendidikan_terakhir">
												<option value="Tidak Sekolah" <?= ($warga['pendidikan_terakhir'] == 'Tidak Sekolah') ? 'selected' : ''; ?>>Tidak Sekolah</option>
												<option value="Tidak Tamat SD" <?= ($warga['pendidikan_terakhir'] == 'Tidak Tamat SD') ? 'selected' : ''; ?>>Tidak Tamat SD</option>
												<option value="SD" <?= ($warga['pendidikan_terakhir'] == 'SD') ? 'selected' : ''; ?>>SD</option>
												<option value="SMP" <?= ($warga['pendidikan_terakhir'] == 'SMP') ? 'selected' : ''; ?>>SMP</option>
												<option value="SMA" <?= ($warga['pendidikan_terakhir'] == 'SMA') ? 'selected' : ''; ?>>SMA</option>
												<option value="D1" <?= ($warga['pendidikan_terakhir'] == 'D1') ? 'selected' : ''; ?>>D1</option>
												<option value="D2" <?= ($warga['pendidikan_terakhir'] == 'D2') ? 'selected' : ''; ?>>D2</option>
												<option value="D3" <?= ($warga['pendidikan_terakhir'] == 'D3') ? 'selected' : ''; ?>>D3</option>
												<option value="S1" <?= ($warga['pendidikan_terakhir'] == 'S1') ? 'selected' : ''; ?>>S1</option>
												<option value="S2" <?= ($warga['pendidikan_terakhir'] == 'S2') ? 'selected' : ''; ?>>S2</option>
												<option value="S3" <?= ($warga['pendidikan_terakhir'] == 'S3') ? 'selected' : ''; ?>>S3</option>
											</select>
											<?= form_error('pendidikan_terakhir', '<small class="text-danger pl-3">', '</small>'); ?>
										</td>
									</tr>
									<tr>
										<th>Pekerjaan</th>
										<td>:</td>
										<td><input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= set_value('pekerjaan', $warga['pekerjaan']); ?>" autocomplete="off">
											<?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?></td>
									</tr>
									<tr>
										<th>Status Perkawinan</th>
										<td>:</td>
										<td>
											<select class="form-control" id="status_perkawinan" name="status_perkawinan">
												<option value="Menikah" <?= ($warga['status_perkawinan'] == 'Menikah') ? 'selected' : ''; ?>>Menikah</option>
												<option value="Belum Menikah" <?= ($warga['status_perkawinan'] == 'Belum Menikah') ? 'selected' : ''; ?>>Belum Menikah</option>
											</select>
										</td>
									</tr>
								</table>

								<div class="text-center">
									<a href="<?= base_url('penduduk'); ?>" class="btn btn-primary btn-sm">Kembali</a>
									<button type="submit" class="btn btn-success btn-sm text-center mr-2">
										<i class="glyphicon glyphicon-floppy-save"></i> Ubah
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