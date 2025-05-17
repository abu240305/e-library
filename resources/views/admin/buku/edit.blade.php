@extends('admin.layout.index')
@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
  <div class="body-wrapper">
    <div class="container-fluid">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Forms</h5>
            <div class="card">
              <div class="card-body">
                <form action="/admin/buku/prosesEdit" method="POST">
                  <input type="text" name="idBuku" value="{{$buku->id}}" hidden>
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="judul" value="{{$buku->judul}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Penulis</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="penulis" value="{{$buku->penulis}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">penerbit</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="penerbit" value="{{$buku->penerbit}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Penerbitan</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tanggal_terbit" value="{{$buku->tanggal_terbit}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="deskripsi" value="{{$buku->deskripsi}}">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kategori</label>
                    <select name="kategori" id="" class="form-select" value="{{$buku->kategori}}">
                      <option value="novel">Novel</option>
                      <option value="ilmiah">Ilmiah</option>
                      <option value="sejarah">Sejarah</option>
                      <option value="edukasi">Edukasi</option>
                      <option value="fiksi">Fiksi</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="stok" class="form-label">Stok Buku</label>
                    <input type="number" class="form-control" id="stok" name="stok" min="1" value="{{$buku->stok_buku}}">
                  </div>
                  <div class="mb-3">
                    <label for="cover" class="form-label">Cover</label>
                    <input type="file" class="form-control" id="cover" name="cover" accept="image/*" value="{{$buku->cover}}">
                  </div>
                  <div class="mb-3">
                    <label for="cover" class="form-label">buku</label>
                    <input type="file" class="form-control" id="buku" name="buku" accept="application/pdf" value="{{$buku->buku}}">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection