<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\peminjaman;
use App\Models\pengembalian;
use App\Models\ulasan;
use App\Models\User;
use App\Models\peminjamen;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    // admin

    public function index(){
        $dtbuku = Buku::count();
        $dtanggota = User::where('role','user')->count();
        $dtpeminjaman = peminjaman::count();
        return view('admin.dashboard.index', compact('dtbuku', 'dtanggota', 'dtpeminjaman'));
    }

    public function buku(){
        $dtbuku=Buku::all();
        return view('admin.buku.index',compact('dtbuku'));
    }

    public function tambahbuku(){
        return view('admin.buku.tambah');
    }
    public function prosesTambahBuku(Request $request){
        $coverPath = $request->file('cover')->store('covers', 'public');
        $bukuPath = $request->file('buku')->store('bukus', 'public');
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tanggal_terbit' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif',
            'buku' => 'required|file|mimes:pdf',
            'stok' => 'required|integer|min:1'
        ]);
        
        Buku::create(
            [
                'judul'=> $request->judul,
                'penulis'=> $request->penulis,
                'penerbit'=> $request->penerbit,
                'tanggal_terbit'=> $request->tanggal_terbit,
                'kategori'=> $request->kategori,
                'deskripsi'=> $request->deskripsi,
                'cover'=> basename($coverPath),
                'buku'=> basename($bukuPath),
                'stok_buku'=> $request->stok,
            ]
        );

        

        return redirect('/admin/buku')->with('success','Data Buku Berhasil Ditambahkan');
    }
    public function delete(Request $request){
        $idBuku=$request->idBuku;
        $buku=Buku::where('id',$idBuku)->first();
        Storage::delete('public/covers/'.$buku->cover);
        Storage::delete('public/bukus/'.$buku->buku);
        $buku->delete();
        return redirect('/admin/buku');
    }
    public function edit(Request $request){
        $idBuku=$request->idBuku;
        $buku=Buku::where('id',$idBuku)->first();
        return view('admin.buku.edit',compact('buku'));
    }
    public function prosesEdit(Request $request){
        $idBuku=$request->idBuku;
        $buku=buku::where('id',$idBuku)->first();
        $buku->judul=$request->judul;
        $buku->penulis=$request->penulis;
        $buku->penerbit=$request->penerbit;
        $buku->tanggal_terbit=$request->tanggal_terbit;
        $buku->kategori=$request->kategori;
        $buku->deskripsi=$request->deskripsi;
        if($request->file('cover')){
            Storage::delete('public/covers/'.$buku->cover);
            $coverPath = $request->file('cover')->store('covers', 'public');
            $buku->cover= basename($coverPath);
        }
        if($request->file('buku')){
            Storage::delete('public/bukus/'.$buku->buku);
            $bukuPath = $request->file('buku')->store('bukus', 'public');
            $buku->buku= basename($bukuPath);
        }
        $buku->stok_buku=$request->stok;
        $buku->save();
        return redirect('/admin/buku')->with('success','Data Buku Berhasil Diubah');
    }

    public function lihatBuku($hashedId){
        $idBuku = Hashids::decode($hashedId)[0]; 
        $itembuku = Buku::where('id', $idBuku)->first(); 
        return view('admin.buku.buku', compact('itembuku'));
    }


    public function anggota(){
        $dtanggota=user::all();
        return view('admin.anggota.index',compact('dtanggota'));
    }

    public function peminjaman(){
        $dtpeminjaman=peminjaman::all();
        return view('admin.peminjaman.index',compact('dtpeminjaman'));
    }
    public function cetakPeminjaman(Request $request){
        $periode = $request->input('periode');
        $peminjamanQuery = peminjaman::query();

        $tanggalAwal = now();
        $tanggalAkhir = now();
        $pdfName = "";

        switch ($periode) {
            case 'hari':
                $tanggalAwal = now();
                $tanggalAkhir = now();
                $peminjamanQuery->whereDate('tanggal_pinjam', now());
                $pdfName = $tanggalAwal->format('d-m-Y');
                break;
            case 'minggu':
                $tanggalAwal = now()->startOfWeek();
                $tanggalAkhir = now()->endOfWeek();
                $peminjamanQuery->whereBetween('tanggal_pinjam', [$tanggalAwal, $tanggalAkhir]);
                $pdfName = $tanggalAwal->format('d-m-Y') . " - " . $tanggalAkhir->format('d-m-Y');
                break;
            case 'bulan':
                $tanggalAwal = now()->startOfMonth();
                $tanggalAkhir = now()->endOfMonth();
                $peminjamanQuery->whereMonth('tanggal_pinjam', now()->month)->whereYear('tanggal_pinjam', now()->year);
                $pdfName = $tanggalAwal->format('F Y') . ", " . $tanggalAwal->format('d-m-Y') . " - " . $tanggalAkhir->format('d-m-Y');
                break;
            case 'tahun':
                $tanggalAwal = now()->startOfYear();
                $tanggalAkhir = now()->endOfYear();
                $peminjamanQuery->whereYear('tanggal_pinjam', now()->year);
                $pdfName = $tanggalAwal->format('Y') . ", " . $tanggalAwal->format('d-m-Y') . " - " . $tanggalAkhir->format('d-m-Y');
                break;
            default:
                break;
        }

        $dtPeminjaman = $peminjamanQuery->get();

        $pdf = Pdf::loadView('admin.peminjaman.cetak', compact('dtPeminjaman', 'periode', 'tanggalAwal', 'tanggalAkhir'));
        return $pdf->download("Laporan Data Pembayaran " . $pdfName . ".pdf");
    }

    public function pengembalian(){
        $dtpengembalian=pengembalian::all();
        return view('admin.pengembalian.index',compact('dtpengembalian'));
    }
    public function cetakPengembalian(Request $request){
        $periode = $request->input('periode');
        $pengembalianQuery = pengembalian::query();

        $tanggalAwal = now();
        $tanggalAkhir = now();
        $pdfName = "";

        switch ($periode) {
            case 'hari':
                $tanggalAwal = now();
                $tanggalAkhir = now();
                $pengembalianQuery->whereDate('tanggal_kembali', now());
                $pdfName = $tanggalAwal->format('d-m-Y');
                break;
            case 'minggu':
                $tanggalAwal = now()->startOfWeek();
                $tanggalAkhir = now()->endOfWeek();
                $pengembalianQuery->whereBetween('tanggal_kembali', [$tanggalAwal, $tanggalAkhir]);
                $pdfName = $tanggalAwal->format('d-m-Y') . " - " . $tanggalAkhir->format('d-m-Y');
                break;
            case 'bulan':
                $tanggalAwal = now()->startOfMonth();
                $tanggalAkhir = now()->endOfMonth();
                $pengembalianQuery->whereMonth('tanggal_kembali', now()->month)->whereYear('tanggal_kembali', now()->year);
                $pdfName = $tanggalAwal->format('F Y') . ", " . $tanggalAwal->format('d-m-Y') . " - " . $tanggalAkhir->format('d-m-Y');
                break;
            case 'tahun':
                $tanggalAwal = now()->startOfYear();
                $tanggalAkhir = now()->endOfYear();
                $pengembalianQuery->whereYear('tanggal_kembali', now()->year);
                $pdfName = $tanggalAwal->format('Y') . ", " . $tanggalAwal->format('d-m-Y') . " - " . $tanggalAkhir->format('d-m-Y');
                break;
            default:
                break;
        }

        $dtpengembalian = $pengembalianQuery->get();

        $pdf = Pdf::loadView('admin.pengembalian.cetak', compact('dtpengembalian', 'periode', 'tanggalAwal', 'tanggalAkhir'));
        return $pdf->download("Laporan Data Pembayaran " . $pdfName . ".pdf");
    }

    public function ulasan(){
        $dtulasan=ulasan::all();
        return view('admin.ulasan.index',compact('dtulasan'));
    }
    public function cetakulasan(Request $request){
        $periode = $request->input('periode');
        $ulasanQuery = ulasan::query();

        $tanggalAwal = now();
        $tanggalAkhir = now();
        $pdfName = "";

        switch ($periode) {
            case 'hari':
                $tanggalAwal = now();
                $tanggalAkhir = now();
                $ulasanQuery->whereDate('tanggal_ulasan', now());
                $pdfName = $tanggalAwal->format('d-m-Y');
                break;
            case 'minggu':
                $tanggalAwal = now()->startOfWeek();
                $tanggalAkhir = now()->endOfWeek();
                $ulasanQuery->whereBetween('tanggal_ulasan', [$tanggalAwal, $tanggalAkhir]);
                $pdfName = $tanggalAwal->format('d-m-Y') . " - " . $tanggalAkhir->format('d-m-Y');
                break;
            case 'bulan':
                $tanggalAwal = now()->startOfMonth();
                $tanggalAkhir = now()->endOfMonth();
                $ulasanQuery->whereMonth('tanggal_ulasan', now()->month)->whereYear('tanggal_ulasan', now()->year);
                $pdfName = $tanggalAwal->format('F Y') . ", " . $tanggalAwal->format('d-m-Y') . " - " . $tanggalAkhir->format('d-m-Y');
                break;
            case 'tahun':
                $tanggalAwal = now()->startOfYear();
                $tanggalAkhir = now()->endOfYear();
                $ulasanQuery->whereYear('tanggal_ulasan', now()->year);
                $pdfName = $tanggalAwal->format('Y') . ", " . $tanggalAwal->format('d-m-Y') . " - " . $tanggalAkhir->format('d-m-Y');
                break;
            default:
                break;
        }

        $dtulasan = $ulasanQuery->get();

        $pdf = Pdf::loadView('admin.ulasan.cetak', compact('dtulasan', 'periode', 'tanggalAwal', 'tanggalAkhir'));
        return $pdf->download("Laporan Data Pembayaran " . $pdfName . ".pdf");
    }

}


