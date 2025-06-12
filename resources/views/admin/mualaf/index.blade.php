<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Manajemen Data Mualaf') }}</h2>
    </div>
</x-slot>
 <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black/20 dark:bg-black-800/40 backdrop-blur-md overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black">
                    <h3 class="font-bold text-lg mb-4">Daftar Konsultasi</h3>
                    <table class="min-w-full bg-black/10 rounded shadow text-black">
                        <thead class="bg-black/10">
                            <tr>
                                <th class="p-2 font-semibold">Nama Lengkap</th>
                                <th class="p-2 font-semibold">No. HP</th>
                                <th class="p-2 font-semibold">Email</th>
                                <th class="p-2 font-semibold">Alamat</th>
                                <th class="p-2 font-semibold">Tanggal Kegiatan</th>
                                <th class="p-2 font-semibold">Waktu Kegiatan</th>
                                <th class="p-2 font-semibold">Catatan</th>
                                <th class="p-2 font-semibold">Persetujuan</th>
                                <th class="p-2 font-semibold">Kesediaan</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($data as $m)
                                <tr class="border-b">
                                    <td class="p-2">{{ $m->nama_lengkap }}</td>
                                    <td class="p-2">{{ $m->nomor_hp }}</td>
                                    <td class="p-2">{{ $m->email }}</td>
                                    <td class="p-2">{{ $m->alamat }}</td>
                                    <td class="p-2">{{ $m->tanggal_kegiatan }}</td>
                                    <td class="p-2">{{ $m->waktu_kegiatan }}</td>
                                    <td class="p-2">{{ $m->catatan }}</td>
                                    <td class="p-2">
                                        @if($m->persetujuan)
                                            <span class="px-2 py-1 rounded bg-green-200">Ya</span>
                                        @else
                                            <span class="px-2 py-1 rounded bg-red-200">Tidak</span>
                                        @endif
                                    </td>
                                    <td class="p-2">{{ ucfirst($m->kesediaan) }}</td>
                                </tr>
                @endforeach
            </tbody>
            </table>
               </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        {{ $data->links() }}
    </div>

</x-app-layout>