<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title ?></title>
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<style>
		@media (max-width: 1200px) {

			.table th,
			.table td {
				font-size: 14px;
			}

			.h1,
			.h3 {
				font-size: 1.5rem;
			}
		}

		@media (max-width: 992px) {

			.table th,
			.table td {
				font-size: 12px;
			}

			.h1,
			.h3 {
				font-size: 1.25rem;
			}
		}

		@media (max-width: 768px) {

			.table th,
			.table td {
				font-size: 10px;
			}

			.h1,
			.h3 {
				font-size: 1rem;
			}

			.btn {
				font-size: 0.875rem;
			}
		}

		@media (max-width: 576px) {

			.table th,
			.table td {
				font-size: 8px;
			}

			.h1,
			.h3 {
				font-size: 0.875rem;
			}

			.btn {
				font-size: 0.75rem;
			}
		}

		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f1f1f1;
			min-width: 160px;
			z-index: 1;
			left: 100%;
			transform: translateX(-100%);
		}

		.dropdown-content a {
			color: black;
			padding: 10px 14px;
			text-decoration: none;
			display: block;
		}

		.dropdown-content a:hover {
			background-color: grey;
		}

		.dropdown:hover .dropdown-content {
			display: block;
		}

		.dropdown {
			position: relative;
			display: inline-block;
		}

		.dropdown-content {
			font-size: 0.75rem;
			text-align: left;
		}

		.table thead th,
		.table tbody td {
			font-size: 14px;
		}

		.custom-select-container {
			position: relative;
		}

		#searchBox {
			margin-bottom: 10px;
		}
	</style>

</head>

<body id="page-top">
	<div id="wrapper">