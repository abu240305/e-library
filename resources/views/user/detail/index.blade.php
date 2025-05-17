<!DOCTYPE html>
<html lang="en">

<head>
	<title>E-Library</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="{{ asset('assetUser/css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('assetUser/icomoon/icomoon.css') }}">
	<link rel="stylesheet" href="{{ asset('assetUser/css/vendor.css') }}">
	<link rel="stylesheet" href="{{ asset('assetUser/style.css') }}">
</head>

<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #efede9;">

	<div class="toast-container position-fixed top-0 end-0 p-3 z-3" style="margin-top: 60px;">
		@if (session('error'))
		<div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="d-flex">
				<div class="toast-body">
					{{ session('error') }}
				</div>
				<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
			</div>
		</div>		
		@endif
	</div>
	

	<!-- Book Detail Section -->
	<section id="best-selling" class="py-5 w-100" style="background-color: #efede9;">
		<div class="container-fluid px-5">
			<div class="row justify-content-center">
				<div class="col-lg-10 p-5 rounded shadow" style="background-color: #efede9;">

					<div class="row g-5 align-items-start">

						<!-- Cover Buku -->
						<div class="col-md-4 text-center">
							<img src="{{ asset('storage/covers/'.$buku->cover) }}" alt="book cover"
								class="img-fluid rounded shadow-sm"
								style="height: 500px; width: 100%; max-width: 350px; object-fit: cover;">
						</div>

						<!-- Info Buku -->
						<div class="col-md-8">
							<h2 class="fw-bold mb-3 border-bottom pb-1 border-3 border-warning d-inline-block">
								{{ $buku->judul }}
							</h2>

							<p class="mb-2"><strong>Penulis:</strong> {{ $buku->penulis }}</p>
							<p class="mb-2"><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>

							<div class="mt-0" style="max-height: 300px; overflow-y: auto;">
								<p class="text-muted" style="text-align: justify; word-wrap: break-word; white-space: pre-line; margin-top: 0;">
									{{ $buku->deskripsi }}
								</p>
							</div>

							<div class="mt-4 d-flex gap-3">
								<a href="/"><button class="btn custom-btn-outline-primary" style="min-width: 120px;">Kembali</button></a>

								<form action="{{ route('peminjaman', $buku->id) }}" method="POST" style="margin: 0;">
									@csrf
									<button type="submit" class="btn custom-btn-outline-primary" style="min-width: 120px;">Pinjam</button>
								</form>
							</div>
						</div> <!-- End Info Buku -->

					</div>

				</div>
			</div>
		</div>
	</section>

	<!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-4CMtacD+9G3KQvEtB7A9vbnmYjRV5o2kUNcBh/6sddcfhXxyYzHl5NBeDjZ0KL5w" crossorigin="anonymous"></script>

	<script src="{{ asset('assetUser/js/vendor.js') }}"></script>
	<script src="{{ asset('assetUser/js/app.js') }}"></script>
	<script src="{{ asset('assetUser/js/custom.js') }}"></script>
	<script src="{{ asset('assetUser/js/main.js') }}"></script>

	<!-- Toast Auto Show Script -->
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			const toastElList = [].slice.call(document.querySelectorAll('.toast'));
			toastElList.forEach(function (toastEl) {
				let toast = new bootstrap.Toast(toastEl);
				toast.show();
			});
		});
	</script>
	
</body>

</html>
