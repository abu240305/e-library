@extends('admin.layout.index')
@section('content')
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      <div class="body-wrapper">
        
        <div class="container-fluid">
          {{-- awal--}}
          <div class="d-flex justify-content-between align-items-start gap-3">
            <div class="col-lg-4">
              <div class="card overflow-hidden" style="background-color: #f8d7da;">
          <div class="card-body p-4">
            <h5 class="card-title mb-9 fw-semibold">Jumlah Anggota</h5>
            <div class="row align-items-center">
              <div class="col-8">
                <h4 class="fw-semibold mb-3">{{$dtanggota}}</h4>
              </div>
              <div class="col-4">
                <div class="d-flex justify-content-center">
            <div id="breakup"></div>
                </div>
              </div>
            </div>
          </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card overflow-hidden" style="background-color: #d4edda;">
          <div class="card-body p-4">
            <h5 class="card-title mb-9 fw-semibold">Jumlah Buku</h5>
            <div class="row align-items-center">
              <div class="col-8">
                <h4 class="fw-semibold mb-3">{{ $dtbuku }}</h4>
              </div>
              <div class="col-4">
                <div class="d-flex justify-content-center">
            <div id="breakup"></div>
                </div>
              </div>
            </div>
          </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card overflow-hidden" style="background-color: #d1ecf1;">
          <div class="card-body p-4">
            <h5 class="card-title mb-9 fw-semibold">Jumlah Buku Yang Di Pinjam</h5>
            <div class="row align-items-center">
              <div class="col-8">
                <h4 class="fw-semibold mb-3">{{$dtpeminjaman}}</h4>
              </div>
              <div class="col-4">
                <div class="d-flex justify-content-center">
            <div id="breakup"></div>
                </div>
              </div>
            </div>
          </div>
              </div>
            </div>
          </div>
          {{-- akhir--}}
        </div>
      </div>
  </div>
@endsection
