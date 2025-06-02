<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Pengembalian;
use App\Models\Ulasan;
use Vinkla\Hashids\Facades\Hashids;


class UserController extends Controller
{
    public function index(){
        $all = Buku::all();

        $genres = [
            'novel' => Buku::where('kategori', 'novel')->get(),
            'ilmia' => Buku::where('kategori', 'ilmia')->get(),
            'sejarah' => Buku::where('kategori', 'sejarah')->get(),
            'edukasi' => Buku::where('kategori', 'edukasi')->get(),
            'fiksi' => Buku::where('kategori', 'fiksi')->get(),
        ];

        return view('user.home.index', compact('all', 'genres'));
    }

    public function detail($id){
        $buku = Buku::where('id',$id)->first();
        
        return view('user.detail.index' , compact('buku'));
    }

    public function peminjaman($bukuId){
        $userId = Auth::id();
        $buku = Buku::findOrFail($bukuId);
    
        $sudahPinjam = Peminjaman::where('user_id', $userId)
            ->where('buku_id', $bukuId)
            ->whereDoesntHave('pengembalian')
            ->exists();
    
        if ($sudahPinjam) {
            return redirect()->back()->with('error', 'Anda sudah meminjam buku ini dan belum mengembalikannya.');
        }
    
        if ($buku->stok_buku <= 0) {
            return redirect()->back()->with('error', 'Stok buku tidak tersedia.');
        }
    
        // Kurangi stok buku
        $buku->stok_buku -= 1;
        $buku->save();
    
        Peminjaman::create([
            'user_id' => $userId,
            'buku_id' => $buku->id,
            'tanggal_pinjam' => now(),
            'batas_pengembalian' => now()->addDays(7),
        ]);
    
        return redirect()->route('peminjaman.daftar', ['id' => $buku->id])->with('success', 'Buku berhasil dipinjam!');
    }
    

    
    public function daftarBukuDipinjam()
    {
        $peminjaman = Peminjaman::where('user_id', Auth::id())
            ->whereDoesntHave('pengembalian') //yang belum ada relasinya
            ->with('buku')  // relasi buku
            ->get();
    
        return view('user.peminjaman.index', compact('peminjaman'));
    }
    

    public function kembalikanBuku($id){
        $peminjaman = Peminjaman::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Kembalikan stok buku
        $peminjaman->buku->increment('stok_buku');

        Pengembalian::create([
            'peminjaman_id' => $peminjaman->id,
            'user_id' => Auth::id(),
            'tanggal_kembali' => now(),
        ]);

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan.');
    }

    public function pengembalian(){
        $pengembalian = Pengembalian::where('user_id', Auth::id())->get();
        foreach ($pengembalian as $x=>$baco) 
            $pengembalian[$x]->tanggal_kembali=date('d-M-Y', strtotime($baco->tanggal_kembali));
        return view('user.pengembalian.index', compact('pengembalian'));
    }


    public function ulasan(){
        $userId = Auth::id();

        // Ambil data pengembalian user, termasuk relasi peminjaman dan bukunya
        $pengembalian = Pengembalian::with('peminjaman.buku')
        ->whereHas('peminjaman', function ($query) use ($userId) {$query->where('user_id', $userId);})
        ->get();

        // Ambil buku dari relasi, pastikan tidak duplikat
        $bukuUnik = $pengembalian->map(function ($item) {return $item->peminjaman->buku;})->unique('id');

        // Ambil ulasan user berdasarkan buku yang pernah diulas
        $ulasan = Ulasan::where('user_id', $userId)->get()->keyBy('buku_id');

        return view('user.ulasan.index', [
            'dataPeminjaman' => $bukuUnik,
            'ulasan' => $ulasan,
        ]);
    }
    public function tambahUlasan($buku_id)
    {
        $buku = Buku::findOrFail($buku_id);
        return view('user.ulasan.tambah', compact('buku'));
    }
    public function prosesUlasan(Request $request)
    {
        $validated = $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'rating' => 'required|integer|between:1,5',
            'ulasan' => 'required|string|max:255',
            'tanggal_ulasan' => 'required|date',
        ]);

        $validated['user_id'] = Auth::id();
        Ulasan::create($validated);

        return redirect()->route('ulasan-buku.index')->with('success', 'Ulasan Anda berhasil dikirim.');
    }

    public function baca($hashedId){
        $idBuku = Hashids::decode($hashedId)[0];
        // dd(Hashids::decode($hashedId)); 
        $itembuku = Buku::where('id', $idBuku)->first(); 
        return view('user.buku.index', compact('itembuku'));
    }

    public function cari(Request $request){
        $cari = $request->cari;
        $genres = [
            'novel' => Buku::where('kategori', 'novel')->get(),
            'ilmia' => Buku::where('kategori', 'ilmia')->get(),
            'sejarah' => Buku::where('kategori', 'sejarah')->get(),
            'edukasi' => Buku::where('kategori', 'edukasi')->get(),
            'fiksi' => Buku::where('kategori', 'fiksi')->get(),
        ];
        $all = Buku::where('judul','LIKE',"%$cari%")->orWhere('penulis','LIKE',"%$cari%")->get();
        return view('user.home.index', compact('all','cari', 'genres'));
    }

    public function cari_pengembalian (Request $request){
        $cari = $request->cari;
        $pengembalian = Pengembalian::whereHas('peminjaman.buku', function ($query) use ($cari) {
        $query->where('judul', 'LIKE', "%$cari%")->orWhere('penulis', 'LIKE', "%$cari%");})
        ->where('user_id', Auth::id())
        ->get();
        foreach ($pengembalian as $x=>$baco) 
            $pengembalian[$x]->tanggal_kembali=date('d-M-Y', strtotime($baco->tanggal_kembali));
        return view('user.pengembalian.index', compact('pengembalian'));
    }
}

