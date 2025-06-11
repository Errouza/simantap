<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Galeri;

class AdminGaleriController extends Controller
{
    public function index()
    {
        $acara = Galeri::orderBy('tanggal_kegiatan', 'desc')->get();
        return view('admin.galeri.index', compact('acara'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('galeri', 'public');
            $validated['foto'] = basename($validated['foto']);
        }
        $data = [
            'nama_kegiatan' => $validated['nama_kegiatan'],
            'tanggal_kegiatan' => $validated['tanggal_kegiatan'],
            'gambar_path' => $validated['foto'],
        ];
        try {
            \App\Models\Galeri::create($data);
            return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->route('admin.galeri.index')->with('error', 'Galeri gagal disimpan!');
        }
    }

    public function edit($id)
    {
        $item = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Galeri::findOrFail($id);
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $data = [
            'nama_kegiatan' => $validated['nama_kegiatan'],
            'tanggal_kegiatan' => $validated['tanggal_kegiatan'],
        ];
        if ($request->hasFile('foto')) {
            if ($item->gambar_path) {
                Storage::disk('public')->delete('galeri/' . $item->gambar_path);
            }
            $data['gambar_path'] = $request->file('foto')->store('galeri', 'public');
            $data['gambar_path'] = basename($data['gambar_path']);
        }
        $item->update($data);
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function show($id)
    {
        $item = \App\Models\Galeri::findOrFail($id);
        return view('admin.galeri.show', compact('item'));
    }
}
