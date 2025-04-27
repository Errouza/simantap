<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Manajemen Berita') }}</h2>
        <a href="{{ route('admin.berita.create') }}" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">+ Tambah Berita</a>
    </div>
</x-slot>
@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">{{ session('success') }}</div>
@endif
<div class="bg-white/20 dark:bg-gray-800/40 backdrop-blur-md rounded shadow p-4">
<table class="min-w-full bg-white/10 rounded shadow text-white">
    <thead class="bg-white/10">
        <tr>
            <th class="p-2 font-semibold">Judul</th>
            <th class="p-2 font-semibold">Tanggal</th>
            <th class="p-2 font-semibold">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($beritas as $berita)
        <tr class="border-t border-white/20 hover:bg-white/10 transition">
            <td class="p-2">{{ $berita->judul }}</td>
            <td class="p-2">{{ $berita->created_at->format('d M Y') }}</td>
            <td class="p-2 flex gap-2">
                <a href="{{ route('admin.berita.edit', $berita->id) }}" class="bg-yellow-400 px-2 py-1 rounded text-xs">Edit</a>
                <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin hapus berita?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</x-app-layout>
