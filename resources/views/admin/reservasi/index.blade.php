<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Manajemen Reservasi Aula') }}
            </h2>
            <a href="{{ route('admin.reservasi.create') }}" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                + Tambah Reservasi
            </a>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white/20 dark:bg-black-800/40 backdrop-blur-md rounded shadow p-4">
        <table class="min-w-full bg-white/10 rounded shadow text-black text-sm">
            <thead class="bg-black/10 text-left">
                <tr>
                    <th class="p-2 font-semibold">Tanggal</th>
                    <th class="p-2 font-semibold">Nama</th>
                    <th class="p-2 font-semibold">Instansi</th>
                    <th class="p-2 font-semibold">Kegiatan</th>
                    <th class="p-2 font-semibold">Peserta</th>
                    <th class="p-2 font-semibold">Waktu</th>
                    <th class="p-2 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($reservasis as $reservasi)
                <tr class="border-t border-white/20 hover:bg-white/10 transition">
                    <td class="p-2">{{ \Carbon\Carbon::parse($reservasi->tanggal_kegiatan)->format('d M Y') }}</td>
                    <td class="p-2">{{ $reservasi->nama_lengkap }}</td>
                    <td class="p-2">{{ $reservasi->instansi }}</td>
                    <td class="p-2">
                        @foreach(json_decode($reservasi->nama_kegiatan, true) ?? [] as $kegiatan)
                            <span class="inline-block bg-gray-300 text-xs px-2 py-0.5 rounded mr-1">{{ $kegiatan }}</span>
                        @endforeach
                    </td>
                    <td class="p-2">{{ $reservasi->jumlah_peserta ?? '-' }}</td>
                    <td class="p-2">{{ \Carbon\Carbon::parse($reservasi->waktu_kegiatan)->format('H:i') }}</td>
                    <td class="p-2 flex gap-2">
                        <a href="{{ route('admin.reservasi.edit', $reservasi->id) }}" class="bg-yellow-400 px-2 py-1 rounded text-xs">Edit</a>
                        <form action="{{ route('admin.reservasi.destroy', $reservasi->id) }}" method="POST" onsubmit="return confirm('Yakin hapus reservasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-xs">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="p-4 text-center text-gray-300">Belum ada data reservasi.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
