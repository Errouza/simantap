<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;

class AdminReservasiController extends Controller
{
    public function index()
    {
        $reservasis = Reservasi::latest()->get();
        return view('admin.reservasi.index', compact('reservasis'));
    }

    public function create()
    {
        return view('admin.reservasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'instansi' => 'nullable|string|max:255',
            'alamat' => 'required|string|max:500',
            'nama_kegiatan' => 'required|array',
            'nama_pengantin_pria' => 'nullable|string|max:255',
            'nama_pengantin_wanita' => 'nullable|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'jumlah_peserta' => 'nullable|string|max:100',
            'waktu_kegiatan' => 'required|string|max:100',
            'ktp_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'persetujuan' => 'required|boolean',
            'kesediaan' => 'required|in:bersedia,tidak',
        ]);

        $data = $request->except('ktp_path');
        $data['nama_kegiatan'] = json_encode($request->nama_kegiatan);

        if ($request->hasFile('ktp_path')) {
            $file = $request->file('ktp_path');
            $path = $file->store('ktp', 'public');
            $data['ktp_path'] = $path;
        }

        Reservasi::create($data);

        return redirect()->route('admin.reservasi.index')->with('success', 'Reservasi berhasil ditambahkan');
    }

    public function edit($id)
    {
       $reservasi = Reservasi::findOrFail($id);
    return view('admin.reservasi.edit', compact('reservasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'instansi' => 'nullable|string|max:255',
            'alamat' => 'required|string|max:500',
            'nama_kegiatan' => 'required|array',
            'nama_pengantin_pria' => 'nullable|string|max:255',
            'nama_pengantin_wanita' => 'nullable|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'jumlah_peserta' => 'nullable|string|max:100',
            'waktu_kegiatan' => 'required|string|max:100',
            'ktp_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'persetujuan' => 'required|boolean',
            'kesediaan' => 'required|in:bersedia,tidak',
        ]);

        $reservasi = Reservasi::findOrFail($id);
        $data = $request->except('ktp_path');
        $data['nama_kegiatan'] = json_encode($request->nama_kegiatan);

        if ($request->hasFile('ktp_path')) {
            $file = $request->file('ktp_path');
            $path = $file->store('ktp', 'public');
            $data['ktp_path'] = $path;
        }

        $reservasi->update($data);

        return redirect()->route('admin.reservasi.index')->with('success', 'Reservasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->delete();

        return redirect()->route('admin.reservasi.index')->with('success', 'Reservasi berhasil dihapus');
    }
}
