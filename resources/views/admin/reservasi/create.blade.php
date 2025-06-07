<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Reservasi Baru
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 rounded shadow p-6 mt-4">
        <form action="{{ route('admin.reservasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="w-full rounded border-gray-300">
                </div>

                <div>
                    <label>Nomor HP</label>
                    <input type="text" name="nomor_hp" value="{{ old('nomor_hp') }}" class="w-full rounded border-gray-300">
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full rounded border-gray-300">
                </div>

                <div>
                    <label>Instansi</label>
                    <input type="text" name="instansi" value="{{ old('instansi') }}" class="w-full rounded border-gray-300">
                </div>

                <div class="md:col-span-2">
                    <label>Alamat</label>
                    <textarea name="alamat" class="w-full rounded border-gray-300">{{ old('alamat') }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label>Nama Kegiatan</label>
                    <select name="nama_kegiatan[]" multiple class="w-full rounded border-gray-300">
                        @foreach(['Akad', 'Pernikahan', 'Pengajian', 'Workshop', 'Rapat', 'Lainnya'] as $item)
                            <option value="{{ $item }}" {{ in_array($item, old('nama_kegiatan', [])) ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Nama Pengantin Pria</label>
                    <input type="text" name="nama_pengantin_pria" value="{{ old('nama_pengantin_pria') }}" class="w-full rounded border-gray-300">
                </div>

                <div>
                    <label>Nama Pengantin Wanita</label>
                    <input type="text" name="nama_pengantin_wanita" value="{{ old('nama_pengantin_wanita') }}" class="w-full rounded border-gray-300">
                </div>

                <div>
                    <label>Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_kegiatan" value="{{ old('tanggal_kegiatan') }}" class="w-full rounded border-gray-300">
                </div>

                <div>
                    <label>Jumlah Peserta</label>
                    <input type="text" name="jumlah_peserta" value="{{ old('jumlah_peserta') }}" class="w-full rounded border-gray-300">
                </div>

                <div>
                    <label>Waktu Kegiatan</label>
                    <input type="time" name="waktu_kegiatan" value="{{ old('waktu_kegiatan') }}" class="w-full rounded border-gray-300">
                </div>

                <div>
                    <label>Upload KTP</label>
                    <input type="file" name="ktp_path" class="w-full rounded border-gray-300">
                </div>

                <div>
                    <label>Persetujuan</label>
                    <select name="persetujuan" class="w-full rounded border-gray-300">
                        <option value="1">Setuju</option>
                        <option value="0">Tidak Setuju</option>
                    </select>
                </div>

                <div>
                    <label>Kesediaan</label>
                    <select name="kesediaan" class="w-full rounded border-gray-300">
                        <option value="bersedia">Bersedia</option>
                        <option value="tidak">Tidak Bersedia</option>
                    </select>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
