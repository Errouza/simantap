<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Laporan Keuangan') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-6 bg-white p-6 rounded shadow">
        <form action="{{ route('admin.keuangan.update', $keuangan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nama Laporan</label>
                <input type="text" name="nama_lengkap" class="w-full border border-gray-300 rounded px-3 py-2" value="{{ $keuangan->nama_lengkap }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Tanggal Kegiatan</label>
                <input type="date" name="tanggal_kegiatan" class="w-full border border-gray-300 rounded px-3 py-2" value="{{ $keuangan->tanggal_kegiatan }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Status</label>
                <select name="status" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="pending" {{ $keuangan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $keuangan->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $keuangan->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>