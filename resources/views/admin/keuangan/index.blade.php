<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Manajemen Laporan Keuangan') }}
            </h2>
            <a href="{{ route('admin.keuangan.create') }}" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                + Tambah Laporan
            </a>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white/20 dark:bg-gray-800/40 backdrop-blur-md rounded shadow p-4">
        <table class="min-w-full bg-white/10 rounded shadow text-white">
            <thead class="bg-white/10">
                <tr>
                    <th class="p-2 font-semibold">Tanggal</th>
                    <th class="p-2 font-semibold">Jenis</th>
                    <th class="p-2 font-semibold">Keterangan</th>
                    <th class="p-2 font-semibold">Jumlah</th>
                    <th class="p-2 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($laporans as $laporan)
                <tr class="border-t border-white/20 hover:bg-white/10 transition">
                    <td class="p-2">{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d M Y') }}</td>
                    <td class="p-2 capitalize">{{ $laporan->jenis }}</td>
                    <td class="p-2">{{ $laporan->keterangan }}</td>
                    <td class="p-2">Rp {{ number_format($laporan->jumlah, 2, ',', '.') }}</td>
                    <td class="p-2 flex gap-2">
                        <a href="{{ route('admin.keuangan.edit', $laporan->id) }}" class="bg-yellow-400 px-2 py-1 rounded text-xs">Edit</a>
                        <form action="{{ route('admin.keuangan.destroy', $laporan->id) }}" method="POST" onsubmit="return confirm('Yakin hapus laporan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-300">Belum ada data laporan keuangan.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
