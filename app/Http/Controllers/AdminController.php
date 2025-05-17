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

    public function pengembalian(){
        $dtpengembalian=pengembalian::all();
        return view('admin.pengembalian.index',compact('dtpengembalian'));
    }

    public function ulasan(){
        $dtulasan=ulasan::all();
        return view('admin.ulasan.index',compact('dtulasan'));
    }

}


