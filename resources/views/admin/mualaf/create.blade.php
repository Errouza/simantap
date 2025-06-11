<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Laporan Keuangan') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-6 bg-white p-6 rounded shadow">
        <form action="{{ route('admin.keuangan.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nama Laporan</label>
                <input type="text" name="nama_lengkap" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Tanggal Kegiatan</label>
                <input type="date" name="tanggal_kegiatan" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Status</label>
                <select name="status" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
