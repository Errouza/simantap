@php $item = isset($item) ? $item : null; @endphp
@if($item)
    <div class="flex flex-col items-center">
        @if($item->gambar_path)
            <img src="{{ asset('storage/galeri/' . $item->gambar_path) }}" alt="Foto" class="w-full h-64 object-cover rounded mb-4">
        @else
            <div class="w-full h-64 flex items-center justify-center bg-gray-200 text-gray-500 rounded mb-4">Tidak ada foto</div>
        @endif
        <div class="font-bold text-lg mb-2">{{ $item->nama_kegiatan }}</div>
        <div class="text-sm text-gray-700 mb-2">Tanggal: {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y') }}</div>
        <div class="text-xs text-gray-500">ID: {{ $item->id }}</div>
    </div>
@endif
