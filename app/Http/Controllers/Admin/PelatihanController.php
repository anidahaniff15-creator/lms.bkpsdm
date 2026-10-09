<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelatihan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PelatihanController extends Controller
{
    public function index()
    {
        $pelatihans = Pelatihan::withCount('pendaftarans')->get();
        return view('admin.pelatihan.index', compact('pelatihans'));
    }

    public function create()
    {
        return view('admin.pelatihan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'           => 'required|string|max:255',
            'deskripsi'       => 'nullable|string',
            'kuota'           => 'required|integer',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date',
            'status'          => 'required|string',
        ]);

        Pelatihan::create([
            'judul'           => $request->judul,
            'slug'            => Str::slug($request->judul),
            'deskripsi'       => $request->deskripsi,
            'kuota'           => $request->kuota,
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status'          => strtolower($request->status),
        ]);

        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);
        return view('admin.pelatihan.edit', compact('pelatihan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'           => 'required|string|max:255',
            'deskripsi'       => 'nullable|string',
            'kuota'           => 'required|integer',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date',
            'status'          => 'required|string',
        ]);

        $pelatihan = Pelatihan::findOrFail($id);

        $pelatihan->update([
            'judul'           => $request->judul,
            'slug'            => Str::slug($request->judul),
            'deskripsi'       => $request->deskripsi,
            'kuota'           => $request->kuota,
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status'          => strtolower($request->status),
        ]);

        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);
        $pelatihan->delete();

        return redirect()->route('pelatihan.index')->with('success', 'Pelatihan berhasil dihapus!');
    }

    public function pendaftar($id)
    {
        $pelatihan = Pelatihan::with('pendaftarans.user')->findOrFail($id);
        return view('admin.pelatihan.pendaftar', compact('pelatihan'));
    }

    public function updateStatusPendaftaran(Request $request, $pendaftaran_id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $pendaftaran = Pendaftaran::findOrFail($pendaftaran_id);
        $pendaftaran->update([
            'status' => strtolower($request->status),
        ]);

        return redirect()->back()->with('success', 'Status peserta berhasil diperbarui!');
    }
}