<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Data Mualaf') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-6 bg-white p-6 rounded shadow">
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('mualaf.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nomor HP</label>
                <input type="text" name="nomor_hp" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Alamat</label>
                <input type="text" name="alamat" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Tanggal Kegiatan</label>
                <input type="date" name="tanggal_kegiatan" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Waktu Kegiatan</label>
                <input type="time" name="waktu_kegiatan" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Catatan (optional)</label>
                <textarea name="catatan" class="w-full border border-gray-300 rounded px-3 py-2" rows="2"></textarea>
            </div>
            <div class="mb-4 flex items-center">
                <input type="checkbox" id="persetujuan" name="persetujuan" value="1" class="mr-2" required>
                <label for="persetujuan" class="text-xs">Saya menyetujui untuk mengikuti SOP Pelayanan Mualaf Center. Seluruh informasi yang saya berikan adalah benar.</label>
            </div>
            <div class="mb-4 flex items-center gap-4">
                <span class="text-sm">Bersedia</span>
                <input type="radio" name="kesediaan" id="bersedia" value="bersedia" class="mr-1" required>
                <span class="text-sm">Tidak Bersedia</span>
                <input type="radio" name="kesediaan" id="tidakbersedia" value="tidak" class="mr-1" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
