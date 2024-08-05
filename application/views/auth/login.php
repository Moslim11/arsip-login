<div class="container">
	<!-- Outer Row -->
	<div class="row justify-content-center">
		<div class="col-lg-6">
			<div class="card o-hidden border-0 shadow-lg my-5" style="background: rgba(255, 255, 255, 0.7);">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center p-0">
									<img class="mb-1" src="<?= base_url('assets/img/bgk.png'); ?>" width="15%">
								</div>
								<div class="text-center mb-4" style="color: #000000; font-size: 20px; font-weight: bold;">
									DESA ADMINISTRATIF PARIGI
								</div>

								<?= $this->session->flashdata('message'); ?>
								<form class="user" method="post" action="<?= base_url('auth'); ?>">
									<div class="form-group">
										<input type="text" class="form-control form-control-user" id="email" placeholder="Masukkan Alamat Email..." name="email" value="<?= set_value('email'); ?>" autocomplete="off">
										<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
										<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<input type="checkbox" id="showPassword">
										<label for="showPassword"> Tampilkan Password</label>
									</div>
									<div class="g-recaptcha" data-sitekey="6Le9784pAAAAAGE4CKtIPSCl9hSROkLj2iNnAwOE"></div>
									<br />
									<button type="submit" class="btn btn-primary btn-user btn-block">
										Login
									</button>
								</form>
								<hr>
								<script>
									document.getElementById("showPassword").addEventListener("change", function() {
										var passwordInput = document.getElementById("password");
										if (this.checked) {
											passwordInput.type = "text";
										} else {
											passwordInput.type = "password";
										}
									});
								</script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>