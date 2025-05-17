  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pemesanan tiket konser</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/logoweb.svg" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <style>
      body {
        background-color: #C5A992;
      }
    </style>
    
  </head>

  <body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
          <div class="row justify-content-center w-100">
            <div class="col-md-10 col-lg-10 col-xxl-6">
              <div class="card mb-0">
                <div class="card-body">
                  <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                    <img src="{{asset('assets/images/logos/logo1.png')}}" width="150" alt="">
                  </a>

                  <p class="text-center">Silahkan Registrasi</p>
                  <form action="/prosesRegister" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-6 mb-2">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="col-md-6 mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                  
                    <div class="row">
                      <div class="col-md-6 mb-2">
                        <label for="no_hp" class="form-label">Nomor HP</label>
                        <input type="tel" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                        @error('no_hp')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                      <div class="col-md-6 mb-2">
                        <label for="asal" class="form-label">Asal</label>
                        <input type="text" class="form-control @error('asal') is-invalid @enderror" id="asal" name="asal" value="{{ old('asal') }}">
                        @error('asal')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                  
                    <div class="mb-2">
                      <label for="alamat" class="form-label">Alamat</label>
                      <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}">
                      @error('alamat')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  
                    <div class="mb-2">
                      <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                      <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="" disabled {{ old('jenis_kelamin') ? '' : 'selected' }}>Pilih jenis kelamin</option>
                        <option value="L" @selected(old('jenis_kelamin') == 'L')>Laki-laki</option>
                        <option value="P" @selected(old('jenis_kelamin') == 'P')>Perempuan</option>
                      </select>
                      @error('jenis_kelamin')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  
                    <div class="mb-2">
                      <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                      <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_Lahir') }}">
                      @error('tanggal_lahir')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                      @error('password')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                  
                    <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Daftar</button> 
                  </form>
                  
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Sudah Punya Akun?</p>
                    <a class="text-primary fw-bold ms-2" href="/">Login</a>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>

  </html>