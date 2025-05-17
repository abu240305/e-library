@extends('user.layout.index')

@section('content')
    <div class="container my-5">
        <div class="">
            <div class="">
                <table class="tableCostum1">
                    <thead style="background-color: antiquewhite">
                        <tr>
                            <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Tanggal Kembali</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach ($pengembalian as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->peminjaman->buku->judul ??'-' }}</td>
                                <td>{{ $item->peminjaman->buku->penulis ??'-'}}</td>
                                <td>{{ $item->tanggal_kembali }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
