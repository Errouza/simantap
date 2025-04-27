<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Konsultasi') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/20 dark:bg-gray-800/40 backdrop-blur-md overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h3 class="font-bold text-lg mb-4">Daftar Konsultasi</h3>
                    <table class="min-w-full bg-white/10 rounded shadow text-white">
                        <thead class="bg-white/10">
                            <tr>
                                <th class="p-2 font-semibold">Nama Lengkap</th>
                                <th class="p-2 font-semibold">No. HP</th>
                                <th class="p-2 font-semibold">Email</th>
                                <th class="p-2 font-semibold">Kategori</th>
                                <th class="p-2 font-semibold">Pertanyaan</th>
                                <th class="p-2 font-semibold">Gambar</th>
                                <th class="p-2 font-semibold">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($konsultasis as $konsultasi)
                            <tr class="border-t border-white/20 hover:bg-white/10 transition">
                                <td class="p-2">{{ $konsultasi->nama_lengkap }}</td>
                                <td class="p-2">{{ $konsultasi->nomor_hp }}</td>
                                <td class="p-2">{{ $konsultasi->email }}</td>
                                <td class="p-2">{{ $konsultasi->kategori }}</td>
                                <td class="p-2">{{ $konsultasi->pertanyaan }}</td>
                                <td class="p-2">
                                    @if($konsultasi->gambar_path)
                                        <a href="{{ asset('storage/'.$konsultasi->gambar_path) }}" target="_blank" class="underline text-blue-400">Lihat</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="p-2">{{ $konsultasi->created_at ? $konsultasi->created_at->format('d M Y H:i') : '-' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="text-center p-4">Belum ada data konsultasi.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
