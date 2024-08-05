<div class="container">
	<div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">TAMBAH AKUN BARU</h1>
						</div>
						<form class="user" method="post" action="<?= base_url('admin/registration'); ?>">
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>" autocomplete="off">
								<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" autocomplete="off">
								<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<select class="form-control" id="role" name="role">
									<option value="">Pilih Role</option>
									<?php foreach ($user_roles as $role) : ?>
										<option value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
									<?php endforeach; ?>
								</select>
								<?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input class="form-control" type="password" class="form-control" id="password1" name="password1" placeholder="Password">
								<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input class="form-control" type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password">
								<?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="checkbox" id="showPassword">
								<label for="showPassword">Tampilkan Password</label>
							</div>
							<button type="submit" class="btn btn-primary btn-user btn-block">
								Tambah
							</button>
						</form>
						<hr>
						<script>
							document.getElementById("showPassword").addEventListener("change", function() {
								var passwordInput1 = document.getElementById("password1");
								var passwordInput2 = document.getElementById("password2");
								if (this.checked) {
									passwordInput1.type = "text";
									passwordInput2.type = "text";
								} else {
									passwordInput1.type = "password";
									passwordInput2.type = "password";
								}
							});
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>