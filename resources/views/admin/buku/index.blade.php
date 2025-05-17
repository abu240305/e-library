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
          <h5 class="card-title fw-semibold mb-4">Tebel Buku</h5>
          <a href="/admin/buku/tambahBuku"><button class="btn btn-primary" type="submit"><i class="bi bi-plus-circle"></i></button></a>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">No</h6>
                  </th>
                  <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Judul Buku</h6>
                  </th>
                  <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Nama Penulis</h6>
                  </th>
                  <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Penerbit</h6>
                  </th>
                  <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Tanggal Penerbit</h6>
                  </th>
                  <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Kategori</h6>
                  </th>
                  <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Stok Buku</h6>
                  </th>
                  <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Cover</h6>
                  </th>
                  <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Buku</h6>
                  </th>
                </tr>
              </thead>
              <tbody> 
                @foreach ($dtbuku as $itembuku)
                  <tr>
                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$loop->iteration}}</h6></td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal">{{$itembuku->judul}}</p>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal">{{$itembuku->penulis}}</p>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal">{{ Str::limit($itembuku->penerbit, 10, '...') }}</p>
                    </td>
                    <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success rounded-3 fw-semibold">{{$itembuku->tanggal_terbit}}<span>
                      </div>
                    </td>
                    
                    <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success rounded-3 fw-semibold">{{$itembuku->kategori}}<span>
                      </div>
                    </td>
                    <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success rounded-3 fw-semibold">{{$itembuku->stok_buku}}<span>
                      </div>
                    </td>
                    <td class="border-bottom-0">
                      <img src="{{asset('storage/covers/'.$itembuku->cover)}}" alt="" width="50px" height="60px">
                    </td>
                    <td class="border-bottom-0">
                      <a href="{{ route('buku.lihat', Hashids::encode($itembuku->id)) }}" target="_blank">Lihat Buku</a>
                    </td>
                    <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-1">
                        <form action="/admin/buku/delete" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                          @csrf
                          <input type="text" value="{{$itembuku->id}}" name="idBuku" hidden>
                          <button class="btn btn-primary" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                        <form action="/admin/buku/edit/" method="POST">
                          @csrf
                          <input type="text" value="{{$itembuku->id}}" name="idBuku" hidden>
                          <button class="btn btn-primary" type="submit"><i class="bi bi-pencil-square"></i></button>
                        </form>
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