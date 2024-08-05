<div class="container">

	<div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Tambah Surat Keluar</h1>
						</div>
						<form method="post" action="<?= base_url('surat/tambahsk'); ?>" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat" value="<?= set_value('nomor_surat'); ?>" autocomplete="off">
								<?= form_error('nomor_surat', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="date" id="tanggal_surat" name="tanggal_surat">
								<?= form_error('tanggal_surat', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan" value="<?= set_value('tujuan'); ?>" autocomplete="off">
								<?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="penerima" name="penerima" placeholder="Penerima" value="<?= set_value('penerima'); ?>" autocomplete="off">
								<?= form_error('penerima', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class=" form-group">
								<input type="text" class="form-control" id="perihal" name="perihal" placeholder="Perihal" autocomplete="off">
								<?= form_error('perihal', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="file" class="custom-file" id="file_surat" name="file_surat">
								<?= form_error('file_surat', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<button type="submit" class="btn btn-primary btn-user btn-block">
								Tambah
							</button>
						</form>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>