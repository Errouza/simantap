<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($artikel) ? 'Edit Artikel' : 'Tambah Artikel' }}
        </h2>
    </x-slot>
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
            <input type="file" name="gambar" accept="image/*" class="w-full border rounded px-3 py-2" id="gambarInput">
            <div id="previewContainer">
                @if(isset($artikel) && $artikel->gambar)
                    <img id="previewGambar" src="{{ asset('storage/'.$artikel->gambar) }}" alt="Gambar Artikel" class="mt-2 w-32 rounded">
                @else
                    <img id="previewGambar" src="#" alt="Preview Gambar" class="mt-2 w-32 rounded hidden">
                @endif
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const input = document.getElementById('gambarInput');
                    const preview = document.getElementById('previewGambar');
                    input.addEventListener('change', function(e) {
                        const file = e.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(ev) {
                                preview.src = ev.target.result;
                                preview.classList.remove('hidden');
                            }
                            reader.readAsDataURL(file);
                        } else {
                            preview.src = '#';
                            preview.classList.add('hidden');
                        }
                    });
                });
            </script>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">{{ isset($artikel) ? 'Update' : 'Tambah' }}</button>
            <a href="{{ route('admin.artikel.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</a>
        </div>
    </form>
</div>
</x-app-layout>
