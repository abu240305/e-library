<!DOCTYPE html>
<html lang="en">

<head>
	<title>E-Library</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

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

								@if(auth()->check())
									<form action="{{ route('peminjaman', $buku->id) }}" method="POST" style="margin: 0;">
										@csrf
										<button type="submit" class="btn custom-btn-outline-primary" style="min-width: 120px;">Pinjam</button>
									</form>
								@else
									<button type="button" class="btn custom-btn-outline-primary" style="min-width: 120px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
										Pinjam
									</button>
								@endif
							</div>
						</div> <!-- End Info Buku -->

					</div>

				</div>
			</div>
		</div>

		<!-- Modal Login -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="loginModalLabel">Login Diperlukan</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Anda harus login untuk meminjam buku. Apakah Anda ingin login sekarang?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
					<a href="{{ route('login') }}" class="btn btn-primary">Login</a>
				</div>
			</div>
		</div>
	</div>


	</section>

	

	<!-- Bootstrap JS Bundle -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>


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
