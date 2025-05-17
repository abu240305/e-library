<!DOCTYPE html>
<html lang="en">

<head>
	<title>E-Library</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<link rel="stylesheet" href="{{ asset('assetUser/css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('assetUser/icomoon/icomoon.css') }}">
	<link rel="stylesheet" href="{{ asset('assetUser/css/vendor.css') }}">
	<link rel="stylesheet" href="{{ asset('assetUser/style.css') }}">
</head>

<body class="d-flex flex-column min-vh-100" data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

	@include('user.layout.navbard')

	<main class="flex-grow-1">
		@yield('content')
	</main>

	@include('user.layout.footer')
	@include('user.layout.modal-akun')

	<script src="{{ asset('assetUser/js/jquery-1.11.0.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
	<script src="{{ asset('assetUser/js/plugins.js') }}"></script>
	<script src="{{ asset('assetUser/js/script.js') }}"></script>
	@stack('scripts')
	{{-- <script>
		document.addEventListener('DOMContentLoaded', () => {
			const modal = document.getElementById('modalDetailBuku');
			modal.addEventListener('show.bs.modal', function (event) {
				const button = event.relatedTarget;
		
				document.getElementById('modalJudul').textContent = button.getAttribute('data-judul');
				document.getElementById('modalPenulis').textContent = button.getAttribute('data-penulis');
				document.getElementById('modalPenerbit').textContent = button.getAttribute('data-penerbit');
				document.getElementById('modalDeskripsi').textContent = button.getAttribute('data-deskripsi');
				document.getElementById('modalCover').src = button.getAttribute('data-cover');
				document.getElementById('modalBukuId').value = button.getAttribute('data-id');
			});
		});
	</script> --}}
</body>

</html>
