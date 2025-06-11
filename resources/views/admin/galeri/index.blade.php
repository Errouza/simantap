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
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 mb-4 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-bold text-lg">Dokumentasi Acara Masjid</h3>
                        <a href="{{ route('admin.galeri.create') }}" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">+ Tambah Galeri</a>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @forelse($acara as $item)
                            <div class="bg-white/20 rounded shadow p-3 flex flex-col items-center cursor-pointer group" onclick="showGaleriModal('{{ $item->id }}')">
                                @if($item->gambar_path)
                                    <img src="{{ asset('storage/galeri/' . $item->gambar_path) }}" alt="Foto" class="w-full h-40 object-cover rounded mb-2 group-hover:scale-105 transition">
                                @else
                                    <div class="w-full h-40 flex items-center justify-center bg-gray-200 text-gray-500 rounded mb-2">Tidak ada foto</div>
                                @endif
                                <div class="font-semibold text-base text-white">{{ $item->nama_kegiatan }}</div>
                                <div class="text-xs text-gray-200 mb-1">{{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y') }}</div>
                                <a href="{{ route('admin.galeri.edit', $item->id) }}" class="text-xs text-yellow-300 hover:underline mt-2">Edit</a>
                            </div>
                        @empty
                            <div class="col-span-3 text-center text-white py-8">Belum ada dokumentasi galeri.</div>
                        @endforelse
                    </div>
                    <!-- Modal Galeri -->
                    <div id="galeriModal" class="fixed inset-0 bg-black/70 z-50 hidden items-center justify-center">
                        <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative">
                            <button onclick="closeGaleriModal()" class="absolute top-2 right-2 text-gray-600 hover:text-red-500">✕</button>
                            <div id="galeriModalContent"></div>
                        </div>
                    </div>
                    <script>
                        function showGaleriModal(id) {
                            fetch(`/admin/galeri/${id}`)
                                .then(res => res.text())
                                .then(html => {
                                    document.getElementById('galeriModalContent').innerHTML = html;
                                    document.getElementById('galeriModal').classList.remove('hidden');
                                    document.getElementById('galeriModal').classList.add('flex');
                                });
                        }
                        function closeGaleriModal() {
                            document.getElementById('galeriModal').classList.add('hidden');
                            document.getElementById('galeriModal').classList.remove('flex');
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
