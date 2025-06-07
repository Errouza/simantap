<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanKeuangan;

class AdminKeuanganController extends Controller
{
    public function index()
    {
        $laporans = LaporanKeuangan::latest()->get();
        return view('admin.keuangan.index', compact('laporans'));
    }

    public function create()
    {
        return view('admin.keuangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
        ]);

        LaporanKeuangan::create($request->all());

        return redirect()->route('admin.keuangan.index')->with('success', 'Laporan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $laporan = LaporanKeuangan::findOrFail($id);
        return view('admin.keuangan.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required|in:pemasukan,pengeluaran',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|min:0',
        ]);

        $laporan = LaporanKeuangan::findOrFail($id);
        $laporan->update($request->all());

        return redirect()->route('admin.keuangan.index')->with('success', 'Laporan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $laporan = LaporanKeuangan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('admin.keuangan.index')->with('success', 'Laporan berhasil dihapus');
    }
}
