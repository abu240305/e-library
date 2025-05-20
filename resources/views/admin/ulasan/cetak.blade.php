<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Ulasan</title>
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
    <h1>Laporan Data Ulasan</h1>
    <p class="subtitle">Dicetak pada: {{ now()->format('d-m-Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama </th>
                <th>Judul Buku</th>
                <th>Rating</th>
                <th>Ulasan</th>
                <th>Tanggal Ulasan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dtulasan as $ulasan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ulasan->user->nama ?? '-' }}</td>
                    <td>{{ $ulasan->buku->judul ?? '-' }}</td>
                    <td>{{ $ulasan->rating ?? '-' }}</td>
                    <td>{{ $ulasan->ulasan ?? '-' }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($ulasan->tanggal_ulasan)->format('d-m-Y') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Tidak ada data ulasan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Admin E-Library</p>
    </div>
</body>

</html>