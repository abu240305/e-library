@extends('user.layout.index')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header text-white text-center" style="background: linear-gradient(90deg, #013220, #025e20);">
                    <h4 class="fw-bold">Berikan Ulasan Anda</h4>
                </div>
                <div class="card-body" style="background-color: #e6f2e6;">
                    <form action="{{ route('ulasan-buku.proses') }}" method="POST">
                        @csrf
                        <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                        <input type="hidden" name="tanggal_ulasan" value="{{ now()->toDateString() }}">

                        <div class="form-group mb-4">
                            <label for="rating" class="form-label fw-bold text-dark">Rating:</label>
                            <select name="rating" id="rating" class="form-control form-select border-dark" required>
                                <option value="" disabled selected>Pilih Rating Anda</option>
                                <option value="1">1 - Sangat Buruk</option>
                                <option value="2">2 - Buruk</option>
                                <option value="3">3 - Cukup</option>
                                <option value="4">4 - Baik</option>
                                <option value="5">5 - Sangat Baik</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="ulasan" class="form-label fw-bold text-dark">Ulasan:</label>
                            <textarea name="ulasan" id="ulasan" class="form-control border-dark" rows="5" placeholder="Tulis ulasan Anda di sini..." required></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-gradient btn-lg text-white" style="background: linear-gradient(90deg, #013220, #025e20);">Kirim Ulasan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
