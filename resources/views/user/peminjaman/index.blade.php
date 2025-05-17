@extends('user.layout.index')

@section('content')

    {{-- Toast Area --}}
    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="toast-container position-fixed top-0 end-0 p-3 z-3">
            @if (session('success'))
                <div class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('success') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('error') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="container my-5">
        <div class="">
            <div class="">
                <table class="tableCostum">
                    <thead style="background-color: antiquewhite">
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Tanggal Pinjam</th>
                            <th>Batas Pengembalian</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($peminjaman as $pinjam)
                            <tr>
                                <td> {{ $loop->iteration}}</td>
                                <td>{{ $pinjam->buku->judul }}</td>
                                <td>{{ $pinjam->buku->penulis }}</td>
                                <td>{{ $pinjam->tanggal_pinjam }}</td>
                                <td>{{ $pinjam->batas_pengembalian }}</td>
                                <td>
                                    <div class="d-flex centerButton">

                                            <a href="{{ route('baca', Hashids::encode($pinjam->buku->id)) }}" target="_blank"><button class="btn custom-btn-outline-primary m-1" type="submit">Baca</button></a>

                                        <form action="{{ route('pengembalian.kembalikan', $pinjam->id) }}" method="POST">
                                            @csrf
                                            <button class="btn custom-btn-outline-primary m-1" type="submit">Kembalikan</button>
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
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toastElList = [].slice.call(document.querySelectorAll('.toast'));
        toastElList.forEach(function (toastEl) {
            const toast = new bootstrap.Toast(toastEl, { delay: 3500 });
            toast.show();
        });
    });
</script>
@endpush
