<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View File Surat</title>
	<style>
		.file-container {
			max-width: 100%;
			height: auto;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg">
				<h1 class="h3 mb-4 text-gray-800">View File Surat</h1>
				<div class="file-container">
					<!-- Contoh menggunakan tag <iframe> untuk menampilkan file PDF -->
					<iframe src="<?= base_url('assets/uploads/sm/' . $surat->file_surat); ?>" width="100%" height="1000px"></iframe>
				</div>
			</div>
		</div>
	</div>
</body>

</html>