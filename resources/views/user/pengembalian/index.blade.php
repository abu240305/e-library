@extends('user.layout.index')

@section('content')
    <div class="container my-5">
        <div class="">
            <div class="">
                <form action="/buku/cari/pengembalian" method="GET">
                    <div class="row mb-3" id="search-wrapper">
                        <div class="col-md-4 mx-auto">
                            <input type="text" id="search-input" class="form-control" placeholder="Cari judul atau penulis..." value="{{$cari ?? ''}}" name="cari">
                        </div>
                    </div>
                </form>
                <table class="tableCostum1">
                    <thead style="background-color: antiquewhite">
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Tanggal Kembali</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody >
                        @if (!$pengembalian->isEmpty())
                            @foreach ($pengembalian as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->peminjaman->buku->judul ??'-' }}</td>
                                <td>{{ $item->peminjaman->buku->penulis ??'-'}}</td>
                                <td>{{ $item->tanggal_kembali->format('d/M/Y') }}</td>
                                <td>
                                    <form action="{{ route('peminjaman', $item->peminjaman->buku->id)}}" method="POST">
                                        @csrf
                                        <button class="btn custom-btn-outline-primary m-1" type="submit">Pinjam Lagi</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <h3 class="text-center">Buku tidak di temukan</h3>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
