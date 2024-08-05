<div class="container">
	<div class="card o-hidden border-0 shadow-lg my-5 col-lg mx-auto">
		<div class="card-body p-0">
			<div class="row">
				<div class="col-lg">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Tambah Kartu Keluarga</h1>
						</div>
						<form method="post" action="<?= base_url('penduduk/tambah_kk'); ?>" enctype="multipart/form-data">
							<h3>A. Data Pribadi</h3>
							<table class="table table-striped table-middle">
								<tr>
									<th width="20%">No Kartu Keluarga</th>
									<td width="1%">:</td>
									<td><input type="text" class="form-control" name="no_kk" value="<?= set_value('no_kk'); ?>" autocomplete="off">
										<?= form_error('no_kk', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Kepala Keluarga</th>
									<td>:</td>
									<td>
										<div class="custom-select-container">
											<input type="text" id="searchBox" class="form-control" placeholder="Cari Kepala Keluarga..." autocomplete="off">
											<select class="form-control selectlive" id="kepalaKeluargaSelect" name="id_kepala_keluarga" required>
												<option value="" selected disabled>- pilih -</option>
												<?php foreach ($data_warga as $warga) : ?>
													<option value="<?php echo $warga['id']; ?>">
														<?php echo $warga['nama']; ?> (NIK: <?php echo $warga['nik']; ?>)
													</option>
												<?php endforeach; ?>
											</select>
											<?= form_error('id_kepala_keluarga', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
									</td>
								</tr>
							</table>

							<h3>B. Data Alamat</h3>
							<table class="table table-striped table-middle">
								<tr>
									<th width="20%">Alamat</th>
									<td width="1%">:</td>
									<td><textarea class="form-control" name="alamat_kk"><?= set_value('alamat_kk'); ?></textarea>
										<?= form_error('alamat_kk', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Desa/Kelurahan</th>
									<td>:</td>
									<td><input type="text" class="form-control" name="desa_kelurahan_kk" value="<?= set_value('desa_kelurahan_kk'); ?>" required autocomplete="off">
										<?= form_error('desa_kelurahan_kk', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Kecamatan</th>
									<td>:</td>
									<td><input type="text" class="form-control" name="kec_kk" value="<?= set_value('kec_kk'); ?>" required autocomplete="off">
										<?= form_error('kec_kk', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Kabupaten/Kota</th>
									<td>:</td>
									<td><input type="text" class="form-control" name="kab_kk" value="<?= set_value('kab_kk'); ?>" required autocomplete="off">
										<?= form_error('kab_kk', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Provinsi</th>
									<td>:</td>
									<td><input type="text" class="form-control" name="prov_kk" value="<?= set_value('prov_kk'); ?>" required autocomplete="off">
										<?= form_error('prov_kk', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Negara</th>
									<td>:</td>
									<td><input type="text" class="form-control" name="negara_kk" value="<?= set_value('negara_kk'); ?>" required autocomplete="off">
										<?= form_error('negara_kk', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>RT</th>
									<td>:</td>
									<td><input type="text" class="form-control" name="rt_kk" value="<?= set_value('rt_kk'); ?>" required autocomplete="off">
										<?= form_error('rt_kk', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>RW</th>
									<td>:</td>
									<td><input type="text" class="form-control" name="rw_kk" value="<?= set_value('rw_kk'); ?>" required autocomplete="off">
										<?= form_error('rw_kk', '<small class="text-danger pl-3">', '</small>'); ?></td>
								</tr>
								<tr>
									<th>Kode Pos</th>
									<td>:</td>
									<td><input type="text" class="form-control" name="kode_pos_kk" value="<?= set_value('kode_pos_kk'); ?>" autocomplete="off">
										<?= form_error('kode_pos_kk', '<small class="text-danger pl-3">', '</small>'); ?></td>
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
