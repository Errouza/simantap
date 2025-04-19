@extends('layouts.admin.admin')
@section('content')
<div class="max-w-lg mx-auto bg-white rounded shadow p-6">
    <h2 class="text-xl font-bold mb-4">{{ isset($artikel) ? 'Edit Artikel' : 'Tambah Artikel' }}</h2>
    <form method="POST" enctype="multipart/form-data" action="{{ isset($artikel) ? route('admin.artikel.update', $artikel->id) : route('admin.artikel.store') }}">
        @csrf
        @if(isset($artikel))
            @method('PUT')
        @endif
        <div class="mb-4">
            <label class="block font-semibold mb-1">Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $artikel->judul ?? '') }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Isi Artikel</label>
            <textarea name="isi" rows="6" class="w-full border rounded px-3 py-2" required>{{ old('isi', $artikel->isi ?? '') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Gambar (opsional)</label>
            <input type="file" name="gambar" accept="image/*" class="w-full border rounded px-3 py-2">
            @if(isset($artikel) && $artikel->gambar)
                <img src="{{ asset('storage/'.$artikel->gambar) }}" alt="Gambar Artikel" class="mt-2 w-32 rounded">
            @endif
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">{{ isset($artikel) ? 'Update' : 'Tambah' }}</button>
            <a href="{{ route('admin.artikel.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
        </div>
    </form>
</div>
@endsection
