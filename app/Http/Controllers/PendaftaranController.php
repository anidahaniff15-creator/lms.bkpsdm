<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pelatihan_id' => 'required|exists:pelatihans,id',
        ]);

        // Cek apakah peserta sudah pernah mendaftar di pelatihan ini
        $sudahDaftar = Pendaftaran::where('user_id', auth()->id())
            ->where('pelatihan_id', $request->pelatihan_id)
            ->exists();

        if ($sudahDaftar) {
            return redirect()->back()->with('error', 'Kamu sudah mendaftar di pelatihan ini!');
        }

        // Simpan pendaftaran baru
        Pendaftaran::create([
            'user_id' => auth()->id(),
            'pelatihan_id' => $request->pelatihan_id,
            'status' => 'TERDAFTAR',
        ]);

        return redirect()->back()->with('success', 'Berhasil mendaftar pelatihan!');
    }
}