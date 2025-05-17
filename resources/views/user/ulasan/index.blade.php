@extends('user.layout.index')

@section('content')

<section class="offer_section layout_padding-bottom">
    <h1 class="text-center mb-5 fw-bold">Daftar Ulasan Anda</h1>
    <div class="container">
        <div class="row">
            @foreach ($dataPeminjaman as $buku)

                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="review-item p-3 border rounded shadow-sm h-100">
                        <div class="review-header text-center mb-2">
                            <h5 class="review-title text-primary fs-6 mb-1">
                                {{ $buku->judul ?? '-' }}
                            </h5>
                            <p class="text-muted mb-0 fs-6">
                                <strong>Penulis:</strong> {{ $buku->penulis ?? '-' }}
                            </p>
                        </div>

                        <div class="review-body mt-2">
                            @if ($ulasan->has($buku->id))
                                @php $review = $ulasan[$buku->id]; @endphp

                                <p class="mb-1 fs-6">
                                    <strong>Rating:</strong>
                                    <span class="badge bg-success p-1">{{ $review->rating }}/5</span>
                                </p>

                                <p class="mb-1 fs-6">
                                    <strong>Nama Pengulas:</strong> {{ $review->user->nama }}
                                </p>

                                <p class="mb-1"><strong>Ulasan:</strong></p>
                                <div class="bg-light p-2 rounded mb-2">
                                    <textarea class="form-control fs-6" rows="5" readonly style="resize: none;">{{ $review->ulasan }}</textarea>
                                </div>

                                <small class="text-muted d-block fs-6">
                                    <strong>Tanggal Ulasan:</strong>
                                    {{ \Carbon\Carbon::parse($review->tanggal_ulasan)->format('d-m-Y') }}
                                </small>
                            @else
                                <a href="{{ route('ulasan-buku.tambah', $buku->id) }}" class="btn custom-btn-outline-primary mt-2">
                                    Tulis Ulasan
                                </a>
                            @endif
                        </div>

                        <div class="review-footer text-center mt-3">
                            <small class="text-muted fs-6">Terima kasih telah membaca buku ini!</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
