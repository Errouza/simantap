<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Laporan Keuangan') }}
        </h2>
    </x-slot>

    <div class="mt-6 bg-white/20 dark:bg-gray-800/40 backdrop-blur-md rounded shadow p-6">
        <form action="{{ route('admin.keuangan.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="tanggal" class="block text-white mb-1">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="w-full rounded p-2 text-gray-800" required>
            </div>

            <div class="mb-4">
                <label for="jenis" class="block text-white mb-1">Jenis</label>
                <select name="jenis" id="jenis" class="w-full rounded p-2 text-gray-800" required>
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="keterangan" class="block text-black mb-1">Keterangan</label>
                <input type="text" id="keterangan" name="keterangan" class="w-full rounded p-2 text-gray-800" required>
            </div>

            <div class="mb-4">
                <label for="jumlah" class="block text-black mb-1">Jumlah (Rp)</label>
                <input type="number" step="0.01" id="jumlah" name="jumlah" class="w-full rounded p-2 text-gray-800" required>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
            <a href="{{ route('admin.keuangan.index') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Batal</a>
        </form>
    </div>
</x-app-layout>
