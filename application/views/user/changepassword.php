<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message'); ?>
			<form action="<?= base_url('user/changepassword'); ?>" method="post">
				<div class="form-group">
					<label for="current_password">Password Lama</label>
					<input type="password" class="form-control" id="current_password" name="current_password">
					<?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="new_password1">Password Baru</label>
					<input type="password" class="form-control" id="new_password1" name="new_password1">
					<?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="new_password2">Ulangi Password</label>
					<input type="password" class="form-control" id="new_password2" name="new_password2">
					<?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<input type="checkbox" id="showPassword">
					<label for="showPassword">Tampilkan Password</label>
				</div>
				<div class="form-group">
					<button type="submit" class="btn-sm btn-primary">UBAH</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
	document.getElementById("showPassword").addEventListener("change", function() {
		var currentPasswordInput = document.getElementById("current_password");
		var newPasswordInput1 = document.getElementById("new_password1");
		var newPasswordInput2 = document.getElementById("new_password2");

		if (this.checked) {
			currentPasswordInput.type = "text";
			newPasswordInput1.type = "text";
			newPasswordInput2.type = "text";
		} else {
			currentPasswordInput.type = "password";
			newPasswordInput1.type = "password";
			newPasswordInput2.type = "password";
		}
	});
</script>