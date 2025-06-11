<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use Illuminate\Support\Facades\Storage;

class ReservasiController extends Controller
{
    public function create()
    {
        return view('layouts.reservasi');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:30',
            'email' => 'required|email|max:255',
            'instansi' => 'nullable|string|max:255',
            'alamat' => 'required|string|max:255',
            'nama_kegiatan' => 'required|array',
            'nama_pengantin_pria' => 'nullable|string|max:255',
            'nama_pengantin_wanita' => 'nullable|string|max:255',
            'tanggal_kegiatan' => 'required|string',
            'jumlah_peserta' => 'nullable|string|max:10',
            'waktu_kegiatan' => 'required|string|max:20',
            'ktp_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'gambar_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'persetujuan' => 'required|boolean',
            'kesediaan' => 'required|in:bersedia,tidak',
        ]);
        // Handle file upload
        if ($request->hasFile('ktp_path')) {
            $validated['ktp_path'] = $request->file('ktp_path')->store('ktp_reservasi', 'public');
        }
        if ($request->hasFile('gambar_path')) {
            $validated['gambar_path'] = $request->file('gambar_path')->store('gambar_reservasi', 'public');
        }
        $validated['nama_kegiatan'] = json_encode($validated['nama_kegiatan']);
        Reservasi::create($validated);
        return redirect()->back()->with('success', 'Reservasi berhasil disimpan!');
    }
}
