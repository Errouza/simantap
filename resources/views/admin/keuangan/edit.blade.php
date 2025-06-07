<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Laporan Keuangan') }}
        </h2>
    </x-slot>

    <div class="mt-6 bg-white/20 dark:bg-gray-800/40 backdrop-blur-md rounded shadow p-6">
        <form action="{{ route('admin.keuangan.update', $laporan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="tanggal" class="block text-white mb-1">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" value="{{ $laporan->tanggal }}" class="w-full rounded p-2 text-gray-800" required>
            </div>

            <div class="mb-4">
                <label for="jenis" class="block text-white mb-1">Jenis</label>
                <select name="jenis" id="jenis" class="w-full rounded p-2 text-gray-800" required>
                    <option value="pemasukan" {{ $laporan->jenis == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                    <option value="pengeluaran" {{ $laporan->jenis == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="keterangan" class="block text-white mb-1">Keterangan</label>
                <input type="text" id="keterangan" name="keterangan" value="{{ $laporan->keterangan }}" class="w-full rounded p-2 text-gray-800" required>
            </div>

            <div class="mb-4">
                <label for="jumlah" class="block text-white mb-1">Jumlah (Rp)</label>
                <input type="number" step="0.01" id="jumlah" name="jumlah" value="{{ $laporan->jumlah }}" class="w-full rounded p-2 text-gray-800" required>
            </div>

            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update</button>
            <a href="{{ route('admin.keuangan.index') }}" class="ml-2 text-white underline">Batal</a>
        </form>
    </div>
</x-app-layout>
