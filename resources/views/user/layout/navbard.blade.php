<header id="header">
    <div class="container-fluid">
        <div class="row align-items-center py-2">
            <div class="col-6 col-md-2 text-center text-md-start">
                <a href="/">
                    <img src="{{ asset('assetUser/images/logo1.png') }}" alt="logo" class="img-fluid" style="max-width: 60%;">
                </a>
            </div>
            <div class="col-6 col-md-10">
                <nav class="navbar navbar-expand-md navbar-light justify-content-md-end">
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="main-menu stellarnav">
                        <ul class="menu-list">
                            <li class="nav-item"><a href="/" class="nav-link">Home</a></li>

                            @if(auth()->check())
                                {{-- User sudah login --}}
                                <li class="nav-item"><a href="/peminjaman/daftar" class="nav-link">Peminjaman</a></li>
                                <li class="nav-item"><a href="/pengembalian" class="nav-link">Pengembalian</a></li>
                                <li class="nav-item"><a href="/ulasan" class="nav-link">Ulasan</a></li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#akunModal">Akun</a>
                                </li>
                            @else
                                {{-- User belum login --}}
                                <li class="nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#ModalLogin">Peminjaman</a></li>
                                <li class="nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#ModalLogin">Pengembalian</a></li>
                                <li class="nav-item"><a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#ModalLogin">Ulasan</a></li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#akunModal">Akun</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Modal Login  -->
<div class="modal fade" id="ModalLogin" tabindex="-1" aria-labelledby="loginConfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginConfirmModalLabel">Perlu Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        Anda harus login terlebih dahulu untuk mengakses ini. Ingin login sekarang?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
      </div>
    </div>
  </div>
</div>

