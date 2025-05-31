    <!doctype html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>E-library</title>
      <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/logo1.png') }}" />
      <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
      <style>
        body {
          background-color: #C5A992;
        }
      </style>
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.964 0L.165 13.233c-.457.778.091 1.767.982 1.767h13.706c.89 0 1.438-.99.982-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1-2.002 0 1 1 0 0 1 2.002 0z"/>
        </symbol>
      </svg>
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.97 11.03a.75.75 0 0 0 1.07 0l3.992-3.992a.75.75 0 0 0-1.06-1.06L7.5 9.439 5.53 7.47a.75.75 0 0 0-1.06 1.06l2.5 2.5z"/>
        </symbol>
      </svg>

    </head>
    <body>

      <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
        data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
          <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
              <div class="col-md-8 col-lg-6 col-xxl-3">
                <div class="card mb-0">
                  <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                          <div>
                            {{ session('error') }}
                          </div>
                        </div>
                    @endif
                    @if (session('success'))
                      <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                          {{ session('success') }}
                        </div>
                      </div>
                    @endif
                    <a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
                      <img src="{{ asset('assets/images/logos/logo1.png') }}" width="150" alt="logo">
                    </a>
                    <p class="text-center">Silahkan Login</p>
                      <form action="/prosesLogin" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                          @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                          @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fs-5 mb-4 rounded-2">Login</button>
                        <div class="d-flex align-items-center justify-content-center">
                          <p class="fs-4 mb-0 fw-bold">Belum Punya Akun?</p>
                          <a class="text-primary fw-bold ms-2" href="/register">Buat Akun</a>
                        </div>
                      </form>
                  
                    

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    </body>
    </html>
