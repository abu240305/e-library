@extends('admin.layout.index')
@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="body-wrapper">
      <div class="container-fluid">
        {{-- tebel mulai --}}
          <div class="row">
            <div class="col">
              <div class="card w-100">
                <div class="card-body p-4">
                  <h5 class="card-title fw-semibold mb-4">Tebel Pengembailan</h5>
                  <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                      <thead class="text-dark fs-4">
                        <tr>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">No</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Nama</h6>
                          </th>
                          <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Judul Buku</h6>
                          </th>
                          <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Nama Penulis</h6>
                          </th>
                          <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Tanggal pengembalian</h6>
                          </th>
                        </tr>
                      </thead>
                      <tbody>     
                        
                          @foreach ($dtpengembalian as $pengembalian)
                          <tr>
                            <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$loop->iteration}}</h6></td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1"></h6>
                                <span class="fw-normal">{{$pengembalian->user->nama}}</span>                          
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">{{$pengembalian->buku->judul ??'-'}}</p>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">{{$pengembalian->buku->penulis ?? '-'}}</p>
                            </td>
                            <td class="border-bottom-0">
                              <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-success rounded-3 fw-semibold">{{$pengembalian->tanggal_kembali}}<span>
                              </div>
                            </td>
                          </tr>
                          @endforeach          
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        {{-- tebel selesai --}}
      </div>
  </div>
</div>
@endsection