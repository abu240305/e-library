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
                <form action="/admin/buku/prosesTambahBuku" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="judul" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Penulis</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="penulis" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">penerbit</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="penerbit" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Penerbitan</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tanggal_terbit" required>
                  </div>
                    <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required></textarea>
                    </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kategori</label>
                    <select name="kategori" id="" class="form-select" required>
                      <option value="novel">Novel</option>
                      <option value="ilmiah">Ilmiah</option>
                      <option value="sejarah">Sejarah</option>
                      <option value="edukasi">Edukasi</option>
                      <option value="fiksi">Fiksi</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="stok" class="form-label">Stok Buku</label>
                    <input type="number" class="form-control" id="stok" name="stok" min="1" required>
                  </div>
                  <div class="mb-3">
                    <label for="cover" class="form-label">Cover</label>
                    <input type="file" class="form-control" id="cover" name="cover" accept="image/*" required>
                  </div>
                  <div class="mb-3">
                    <label for="cover" class="form-label">buku</label>
                    <input type="file" class="form-control" id="buku" name="buku" accept="application/pdf" required>
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