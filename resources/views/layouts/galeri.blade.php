<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Masjid | Masjid Jami Tangkubanperahu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-700 bg-[#f5f5f2] antialiased">
    <header class="bg-white shadow-sm">
      <div class="max-w-6xl mx-auto flex items-center justify-between py-2 px-4">
        <div class="flex items-center gap-3">
          <a href="/home" class="flex items-center gap-3">
            <img src="{{ asset('aset/logoMasjid.svg') }}" alt="Logo" class="w-16 h-16 object-contain">
            <span class="text-xl font-bold text-gray-700">Masjid Jami Tangkubanperahu</span>
          </a>
        </div>
        <nav class="flex gap-2 md:gap-4">
          <a href="/home" class="bg-[#d2cc8c] rounded-full px-3 py-1 text-xs md:text-sm font-semibold shadow hover:bg-[#c6be7b] transition">Home</a>
          <a href="/agenda" class="bg-[#d2cc8c] rounded-full px-3 py-1 text-xs md:text-sm font-semibold shadow hover:bg-[#c6be7b] transition">Agenda</a>
          <a href="/artikel" class="bg-[#d2cc8c] rounded-full px-3 py-1 text-xs md:text-sm font-semibold shadow hover:bg-[#c6be7b] transition">Artikel</a>
          <a href="#" class="bg-[#d2cc8c] rounded-full px-3 py-1 text-xs md:text-sm font-semibold shadow hover:bg-[#c6be7b] transition">Berita</a>

          <a href="/informasi" class="bg-[#d2cc8c] rounded-full px-3 py-1 text-xs md:text-sm font-semibold shadow hover:bg-[#c6be7b] transition">Informasi</a>
        </nav>
      </div>
    </header>

    <main class="max-w-6xl mx-auto py-8 px-4">
      <h1 class="text-2xl font-bold text-center text-green-700 mb-6">Galeri Masjid</h1>
      <div class="text-xs text-gray-700 text-center mb-8">
        Berikut adalah dokumentasi acara yang pernah diadakan di Aula Masjid Jami Tangkubanperahu.
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($acara as $item)
          <div class="bg-white rounded-xl shadow p-5 flex flex-col gap-3">
            <div class="flex items-center gap-2 mb-2">
              <span class="inline-block px-2 py-1 bg-[#d2cc8c] text-xs rounded-full font-semibold">{{ $item->instansi ?? '-' }}</span>
              <span class="text-xs text-gray-500 ml-auto">{{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d M Y') }}</span>
            </div>
            <div class="font-bold text-lg text-[#4b4b2e] mb-1">
              @if(is_array($item->nama_kegiatan))
                {{ implode(', ', $item->nama_kegiatan) }}
              @else
                {{ $item->nama_kegiatan }}
              @endif
            </div>
            <div class="text-xs text-gray-600 mb-1">
              Waktu: {{ $item->waktu_kegiatan }}<br>
              Jumlah Peserta: {{ $item->jumlah_peserta ?? '-' }}
            </div>
            @if($item->nama_pengantin_pria || $item->nama_pengantin_wanita)
              <div class="text-xs text-gray-700 mb-1">
                <span class="font-semibold">Pernikahan:</span>
                {{ $item->nama_pengantin_pria ?? '-' }} &amp; {{ $item->nama_pengantin_wanita ?? '-' }}
              </div>
            @endif
            @if($item->ktp_path)
              <div class="mt-2">
                <a href="{{ asset('storage/'.$item->ktp_path) }}" target="_blank" class="inline-block bg-[#b7b36e] text-white px-3 py-1 rounded text-xs hover:bg-[#a5a15a] transition">Lihat Dokumentasi</a>
              </div>
            @endif
          </div>
        @empty
          <div class="col-span-3 text-center text-gray-500 py-8">Belum ada dokumentasi acara di aula masjid.</div>
        @endforelse
      </div>
    </main>

    <footer class="mt-10 bg-[#e8e8e3] border-t border-gray-200 relative overflow-hidden">
      <img src="{{ asset('aset/imagemasjid.svg') }}" alt="Footer Background" class="absolute inset-0 w-full h-full object-cover opacity-30 pointer-events-none select-none" />
      <div class="relative max-w-6xl mx-auto py-8 px-4 grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
        <div class="flex flex-col items-center md:items-start gap-2">
          <img src="{{ asset('aset/logoMasjid.svg') }}" alt="Logo" class="w-21 h-21 object-contain">
          <p class="text-sm font-semibold">Selamat Datang Di Website Resmi Masjid Jami<br>Tangkubanperahu, Jakarta</p>
        </div>
        <div class="md:col-span-2 flex justify-center">
          <iframe src="https://www.openstreetmap.org/export/embed.html?bbox=106.833574%2C-6.208285%2C106.835574%2C-6.206285&layer=mapnik&marker=-6.207285,106.834574" class="w-full h-96 rounded-xl border border-gray-300 shadow" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>
    </footer>
</body>
</html>
