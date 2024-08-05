<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg-8">
			<?= form_open_multipart('admin/editakun/' . $akun['id']); ?>
			<!-- Menggunakan 'form_open_multipart' dan menambahkan ID akun pada URL untuk memproses form -->
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" value="<?= $akun['name']; ?>">
					<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="email" name="email" value="<?= $akun['email']; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="role" class="col-sm-2 col-form-label">Role</label>
				<div class="col-sm-10">
					<select name="role" id="role" class="form-control">
						<?php foreach ($user_roles as $role) : ?>
							<?php if ($role['id'] == $akun['role_id']) : ?>
								<option value="<?= $role['id']; ?>" selected><?= $role['role']; ?></option>
							<?php else : ?>
								<option value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group row justify-content-end">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Ubah</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->