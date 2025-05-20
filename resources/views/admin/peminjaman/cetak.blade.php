<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #000;
        }

        h1 {
            text-align: center;
            margin-bottom: 5px;
        }

        p.subtitle {
            text-align: center;
            margin-bottom: 20px;
            font-size: 14px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 30px;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <h1>Laporan Data Peminjaman</h1>
    <p class="subtitle">Dicetak pada: {{ now()->format('d-m-Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Nama Penulis</th>
                <th>Tanggal Peminjaman</th>
                <th>Batas Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dtPeminjaman as $peminjaman)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $peminjaman->user->nama ?? '-' }}</td>
                    <td>{{ $peminjaman->buku->judul ?? '-' }}</td>
                    <td>{{ $peminjaman->buku->penulis ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($peminjaman->batas_pengembalian)->format('d-m-Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data pengembalian.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Admin E-Library</p>
    </div>
</body>

</html>
