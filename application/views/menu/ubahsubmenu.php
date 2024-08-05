<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg-8">
			<?= form_open_multipart('Menu/ubahSubmenu/' . $akun['id']); ?>
			<!-- Menggunakan 'form_open_multipart' dan menambahkan ID akun pada URL untuk memproses form -->
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Title</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="title" name="title" value="<?= $akun['title']; ?>">
					<?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<div class="form-group row">
				<label for="menu" class="col-sm-2 col-form-label">Menu</label>
				<div class="col-sm-10">
					<select name="menu" id="menu" class="form-control">
						<?php foreach ($user_menu as $um) : ?>
							<?php if ($um['id'] == $akun['menu_id']) : ?>
								<option value="<?= $um['id']; ?>" selected><?= $um['menu']; ?></option>
							<?php else : ?>
								<option value="<?= $um['id']; ?>"><?= $um['menu']; ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="url" class="col-sm-2 col-form-label">Url</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="url" name="url" value="<?= $akun['url']; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="icon" class="col-sm-2 col-form-label">Icon</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="icon" name="icon" value="<?= $akun['icon']; ?>">
				</div>
			</div>
			<div class="form-group row justify-content-end">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Edit</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->