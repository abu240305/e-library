@extends('admin.layout.index')
@section('content')
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!--  Main wrapper -->
      <div class="body-wrapper">
        
        <div class="container-fluid">
          {{-- tebel angota --}}
          <div class="row">
            <div class="col">
              <div class="card w-100">
                <div class="card-body p-4">
                  <h5 class="card-title fw-semibold mb-4">Tebel Anggota</h5>
                  <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                      <thead class="text-dark fs-4">
                        <tr>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Id</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Nama</h6>
                          </th>
                          <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Asal</h6>
                          </th>
                          <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Jenis Kelamin</h6>
                          </th>
                          <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Tanggal Lahir</h6>
                          </th>
                          <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Alamat</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Email</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Nomor Hp</h6>
                          </th>
                          <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Role</h6>
                          </th>
                        </tr>
                      </thead>
                      <tbody>     
                        
                          @foreach ($dtanggota as $anggota)
                          <tr>
                            <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$loop->iteration}}</h6></td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1"></h6>
                                <span class="fw-normal">{{$anggota->nama}}</span>                          
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">{{$anggota->asal}}</p>
                            </td>
                            <td class="border-bottom-0">
                              <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-success rounded-3 fw-semibold">{{$anggota->jenis_kelamin}}</span>
                              </div>
                            </td>
                            <td class="border-bottom-0">
                              <h6 class="mb-0 fw-normal">{{$anggota->tanggal_lahir}}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$anggota->alamat}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$anggota->email}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$anggota->no_hp}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$anggota->role}}</p>
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
          {{-- akhir tebel anggota --}}
        </div>
      </div>
    </div>
@endsection