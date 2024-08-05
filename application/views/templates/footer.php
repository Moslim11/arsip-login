<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<strong>
				<span>Copyright &copy; Desa Administratif Parigi <?= date('Y'); ?></span>
			</strong>
		</div>
	</div>
</footer>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script>
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});

	$('.form-check-input').on('click', function() {
		const menuId = $(this).data('menu');
		const roleId = $(this).data('role');

		$.ajax({
			url: "<?= base_url('admin/changeaccess') ?>",
			type: 'post',
			data: {
				menuId: menuId,
				roleId: roleId
			},
			success: function() {
				document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
			}
		});
	});
</script>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		const sidebar = document.querySelector('.sidebar');

		// Menerapkan Bootstrap Collapse pada submenu
		const subMenus = document.querySelectorAll('.collapse');
		subMenus.forEach(subMenu => {
			new bootstrap.Collapse(subMenu, {
				toggle: false
			});
		});

		// Menambahkan event listener untuk tombol toggle
		const sidebarToggle = document.getElementById('sidebarToggle');
		sidebarToggle.addEventListener('click', function() {
			sidebar.classList.toggle('toggled');
		});
	});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script>
	function printPage() {
		window.print();
	}
</script>
<script>
	function filterTable() {
		var input, filter, table, tr, td, i, j, txtValue;
		input = document.getElementById('searchInput');
		filter = input.value.toLowerCase();
		table = document.getElementById('datatable');
		tr = table.getElementsByTagName('tr');
		for (i = 1; i < tr.length; i++) {
			tr[i].style.display = 'none';
			td = tr[i].getElementsByTagName('td');
			for (j = 0; j < td.length; j++) {
				if (td[j]) {
					txtValue = td[j].textContent || td[j].innerText;
					if (txtValue.toLowerCase().indexOf(filter) > -1) {
						tr[i].style.display = '';
						break;
					}
				}
			}
		}
	}
</script>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		var searchBox = document.getElementById("searchBox");
		var select = document.getElementById("kepalaKeluargaSelect");

		searchBox.addEventListener("keyup", function() {
			var filter = searchBox.value.toUpperCase();
			var options = select.getElementsByTagName("option");

			for (var i = 0; i < options.length; i++) {
				var txtValue = options[i].textContent || options[i].innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					options[i].style.display = "";
				} else {
					options[i].style.display = "none";
				}
			}
		});
	});
</script>
</body>

</html>
