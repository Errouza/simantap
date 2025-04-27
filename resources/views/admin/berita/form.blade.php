<x-app-layout>
<div class="max-w-lg mx-auto bg-white rounded shadow p-6">
    <h2 class="text-xl font-bold mb-4">{{ isset($berita) ? 'Edit Berita' : 'Tambah Berita' }}</h2>
    <form method="POST" enctype="multipart/form-data" action="{{ isset($berita) ? route('admin.berita.update', $berita->id) : route('admin.berita.store') }}">
        @csrf
        @if(isset($berita))
            @method('PUT')
        @endif
        <div class="mb-4">
            <label class="block font-semibold mb-1">Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $berita->judul ?? '') }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Isi Berita</label>
            <textarea name="isi" rows="6" class="w-full border rounded px-3 py-2" required>{{ old('isi', $berita->isi ?? '') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Gambar (opsional)</label>
            <input type="file" name="gambar" accept="image/*" class="w-full border rounded px-3 py-2">
            @if(isset($berita) && $berita->gambar)
                <img src="{{ asset('storage/'.$berita->gambar) }}" alt="Gambar Berita" class="mt-2 w-32 rounded">
            @endif
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">{{ isset($berita) ? 'Update' : 'Tambah' }}</button>
            <a href="{{ route('admin.berita.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
        </div>
    </form>
</div>
</x-app-layout>
