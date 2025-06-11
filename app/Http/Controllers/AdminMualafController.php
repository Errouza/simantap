<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mualaf;

class AdminMualafController extends Controller
{
    public function index()
    {
        $data = mualaf::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.mualaf.index', compact('data'));
    }

    public function create()
    {
        return view('admin.mualaf.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:20',
            'email' => 'required|email',
            'alamat' => 'required|string',
            'tanggal_kegiatan' => 'required|date',
            'waktu_kegiatan' => 'required|string',
            'catatan' => 'nullable|string',
            'persetujuan' => 'required|boolean',
            'kesediaan' => 'required|in:bersedia,tidak',
        ]);

        mualaf::create($validated);

        return redirect()->route('admin.mualaf.index')->with('success', 'Data mualaf berhasil ditambahkan.');
    }

    public function show($id)
    {
        $mualaf = mualaf::findOrFail($id);
        return view('admin.mualaf.show', compact('mualaf'));
    }

    public function edit($id)
    {
        $mualaf = mualaf::findOrFail($id);
        return view('admin.mualaf.edit', compact('mualaf'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:20',
            'email' => 'required|email',
            'alamat' => 'required|string',
            'tanggal_kegiatan' => 'required|date',
            'waktu_kegiatan' => 'required|string',
            'catatan' => 'nullable|string',
            'persetujuan' => 'required|boolean',
            'kesediaan' => 'required|in:bersedia,tidak',
        ]);

        $mualaf = mualaf::findOrFail($id);
        $mualaf->update($validated);

        return redirect()->route('admin.mualaf.index')->with('success', 'Data mualaf berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mualaf = mualaf::findOrFail($id);
        $mualaf->delete();

        return redirect()->route('admin.mualaf.index')->with('success', 'Data mualaf berhasil dihapus.');
    }
}
