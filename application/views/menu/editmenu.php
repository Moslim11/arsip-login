<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="col-lg-4">
		<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
		<form action="<?= base_url('menu/editMenu/' . $menu['id']); ?>" method="post">
			<div class="form-group">
				<div class="col-sm-10 row">
					<input type="text" class="form-control" id="menu" name="menu" value="<?= $menu['menu']; ?>">
					<?= form_error('menu', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Edit</button>
		</form>
	</div>
</div>
</div>