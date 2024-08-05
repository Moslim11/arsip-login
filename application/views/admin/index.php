<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="row">
		<div class="col-md-3 mb-4">
			<div class="card border-left-primary shadow h-100 py-3">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Total Pengguna</div>
							<div class=" font-weight-bold text-gray-800"><?= $totalUsers; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user-tie fa-2x text-black"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 mb-4">
			<div class="card border-left-success shadow h-100 py-3">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Total Surat Masuk</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalSuratMasuk; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-envelope fa-2x text-black"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 mb-4">
			<div class="card border-left-danger shadow h-100 py-3">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Total Surat Keluar</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalSuratKeluar; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-envelope-open-text fa-2x text-black-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 mb-4">
			<div class="card border-left-warning shadow h-100 py-3">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Jumlah Warga</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalwarga; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user fa-2x text-black-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 mb-4">
			<div class="card border-left-warning shadow h-100 py-3">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Jumlah Kartu Keluarga</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalkk; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-black-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
