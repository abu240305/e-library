@extends('user.layout.index')

@section('content')

<style>
    .book-item {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .book-item.hidden {
        opacity: 0;
        pointer-events: none;
        transform: scale(0.95);
        height: 0 !important;
        margin: 0 !important;
        padding: 0 !important;
        overflow: hidden;
    }
</style>

<section id="popular-books" class="bookshelf py-5 my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="section-header text-center">
                    <h2 class="section-title">Daftar Buku</h2>
                </div>


                {{-- Tabs --}}
                <ul class="tabs">
                    <li data-tab-target="#all-genre" class="active tab">All Genre</li>
                    <li data-tab-target="#novel" class="tab">Novel</li>
                    <li data-tab-target="#ilmia" class="tab">Ilmia</li>
                    <li data-tab-target="#sejarah" class="tab">Sejarah</li>
                    <li data-tab-target="#edukasi" class="tab">Edukasi</li>
                    <li data-tab-target="#fiksi" class="tab">Fiksi</li>
                </ul>

                <div class="row mb-3">
                    <div class="col-md-4 mx-auto">
                        <input type="text" id="search-input" class="form-control" placeholder="Cari judul atau penulis...">
                    </div>
                </div>

                <div class="tab-content">
                    {{-- All Genre --}}
                    <div id="all-genre" data-tab-content class="active">
                        <div class="row">
                            @foreach ($all as $buku)
                            <div class="col-lg-2 mb-1 book-item"
                                data-title="{{ strtolower($buku->judul) }}"
                                data-author="{{ strtolower($buku->penulis) }}">
                                <div class="product-item text-center shadow-sm rounded p-2 bg-white h-60 book-card">
                                    <figure class="product-style mb-1">
                                        <img src="{{ asset('storage/covers/'.$buku->cover) }}" alt="{{ $buku->judul }}"
                                            class="img-fluid rounded"
                                            style="width: 100%; aspect-ratio: 2/3; object-fit: cover;">
                                    </figure>
                                    <figcaption style="margin-bottom: 1px;">
                                        <h6 class="mb-0" style="font-size: 0.8rem;">{{ $buku->judul }}</h6>
                                        <small class="text-muted" style="font-size: 0.7rem;">{{ $buku->penulis }}</small>
                                        <div class="mt-1">
                                            <small class="text-muted" style="font-size: 0.7rem;">Stok: {{ $buku->stok_buku }}</small>
                                        </div>
                                    </figcaption>
                                    <form action="{{ route('detail', $buku->id) }}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-sm custom-btn-outline-primary w-80 h-50" style="font-size: 0.7rem;">
                                            Lihat Detail
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>                                                  

                    {{-- Genre tabs --}}
                    @foreach ($genres as $namaGenre => $daftarBuku)
                    <div id="{{ $namaGenre }}" data-tab-content>
                        <div class="row">
                            @foreach ($daftarBuku as $buku)
                            <div class="col-lg-2 mb-1 book-item"
                                data-title="{{ strtolower($buku->judul) }}"
                                data-author="{{ strtolower($buku->penulis) }}">
                                <div class="product-item text-center shadow-sm rounded p-2 bg-white h-60 book-card">
                                    <figure class="product-style mb-1">
                                        <img src="{{ asset('storage/covers/'.$buku->cover) }}" alt="{{ $buku->judul }}"
                                            class="img-fluid rounded"
                                            style="width: 100%; aspect-ratio: 2/3; object-fit: cover;">
                                    </figure>
                                    <figcaption style="margin-bottom: 1px;">
                                        <h6 class="mb-0" style="font-size: 0.8rem;">{{ $buku->judul }}</h6>
                                        <small class="text-muted" style="font-size: 0.7rem;">{{ $buku->penulis }}</small>
                                        <div class="mt-1">
                                            <small class="text-muted" style="font-size: 0.7rem;">Stok: {{ $buku->stok_buku }}</small>
                                        </div>
                                    </figcaption>
                                    <form action="{{ route('detail', $buku->id) }}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-sm custom-btn-outline-primary w-80 h-50" style="font-size: 0.7rem;">
                                            Lihat Detail
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search-input');

        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase();
            const activeTab = document.querySelector('.tab-content > div.active');
            const books = activeTab.querySelectorAll('.book-item');

            books.forEach(function (book) {
                const title = book.getAttribute('data-title');
                const author = book.getAttribute('data-author');

                if (title.includes(keyword) || author.includes(keyword)) {
                    book.classList.remove('hidden');
                } else {
                    book.classList.add('hidden');
                }
            });
        });

        const tabButtons = document.querySelectorAll('.tabs .tab');
        tabButtons.forEach(button => {
            button.addEventListener('click', function () {
                tabButtons.forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('[data-tab-content]').forEach(tab => tab.classList.remove('active'));
                this.classList.add('active');
                const target = document.querySelector(this.dataset.tabTarget);
                target.classList.add('active');

                searchInput.dispatchEvent(new Event('input'));
            });
        });
    });
</script>

@endsection
