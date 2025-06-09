<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Galeri') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/20 dark:bg-gray-800/40 backdrop-blur-md overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h3 class="font-bold text-lg mb-4">Dokumentasi Acara Masjid</h3>

                    <table class="min-w-full bg-white/10 rounded shadow text-white">
                        <thead class="bg-white/10">
                            <tr>
                                <th class="p-2 font-semibold">Nama Kegiatan</th>
                                <th class="p-2 font-semibold">Tanggal Kegiatan</th>
                                <th class="p-2 font-semibold">Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($acara as $item)
                                <tr class="border-t border-white/20 hover:bg-white/10 transition">
                                    <td class="p-2">{{ $item->nama_kegiatan }}</td>
                                    <td class="p-2">{{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y') }}</td>
                                    <td class="p-2">
                                        @if($item->foto)
                                            <a href="{{ asset('storage/galeri/' . $item->foto) }}" target="_blank">
                                                <img src="{{ asset('storage/galeri/' . $item->foto) }}" alt="Foto" class="w-24 h-16 object-cover rounded">
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center p-4">Belum ada dokumentasi galeri.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
