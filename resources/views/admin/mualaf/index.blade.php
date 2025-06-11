<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Manajemen Data Mualaf') }}
            </h2>
            <a href="{{ route('admin.mualaf.create') }}" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                + Tambah Data Mualaf
            </a>
        </div>
    </x-slot>
    
    @if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 mb-4 rounded">
    {{ session('success') }}
</div>
@endif

<table class="w-full table-auto bg-white shadow rounded-xl">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-2">Nama</th>
            <th class="p-2">Tanggal</th>
            <th class="p-2">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $m)
        <tr class="border-b">
            <td class="p-2">{{ $m->nama_lengkap }}</td>
            <td class="p-2">{{ $m->tanggal_kegiatan }}</td>
            <td class="p-2">
                <span class="px-2 py-1 rounded {{ $m->status == 'approved' ? 'bg-green-200' : ($m->status == 'rejected' ? 'bg-red-200' : 'bg-yellow-200') }}">
                    {{ ucfirst($m->status) }}
                </span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $data->links() }}
</div>

</x-app-layout>