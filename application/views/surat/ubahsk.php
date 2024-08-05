<div class="container-fluid">
	<!-- Nested Row within Card Body -->
	<div class="row">
		<div class="col-lg-6">
			<div class="p-5">
				<div>
					<h1 class="h4 text-gray-900 mb-4">Edit Surat Keluar</h1>
				</div>
				<form method="post" action="<?= base_url('surat/ubahsk/' . $surat->id); ?>" enctype="multipart/form-data">
					<div class="form-group">
						<input type="hidden" name="surat_id" value="<?= $surat->id; ?>">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat" value="<?= $surat->nomor_surat; ?>" readonly>
						<?= form_error('nomor_surat', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<input type="date" id="tanggal_surat" name="tanggal_surat" value="<?= date('Y-m-d', strtotime($surat->tanggal_surat)); ?>">
						<?= form_error('tanggal_surat', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan" value="<?= $surat->tujuan; ?>">
						<?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="penerima" name="penerima" placeholder="Penerima" value="<?= $surat->penerima; ?>">
						<?= form_error('penerima', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="perihal" name="perihal" placeholder="Perihal" value="<?= $surat->perihal; ?>">
						<?= form_error('perihal', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="file_surat" name="file_surat">
										<label class="custom-file-label" for="file_surat"><?= $surat->file_surat; ?></label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group row justify-content-end">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
						</div>
					</div>
				</form>
				<hr>
			</div>
		</div>
	</div>
</div>
</div>