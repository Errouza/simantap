<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'artikel') }}</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

   <!-- Scripts -->
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-700 bg-[#f5f5f2] antialiased">
  <!-- Header & Navbar -->
  <header class="bg-white shadow-sm">
    <div class="max-w-6xl mx-auto flex items-center justify-between py-2 px-4">
      <div class="flex items-center gap-3">
        <img src="{{ asset('aset/logoMasjid.svg') }}" alt="Logo" class="w-16 h-16 object-contain">
        <span class="text-xl font-bold text-gray-700">Masjid Jami Tangkubanperahu</span>
      </div>
      <nav class="flex gap-2 md:gap-4">
        <a href="/home" class="bg-[#d2cc8c] rounded-full px-3 py-1 text-xs md:text-sm font-semibold shadow hover:bg-[#c6be7b] transition">Home</a>
        <a href="#" class="bg-[#d2cc8c] rounded-full px-3 py-1 text-xs md:text-sm font-semibold shadow hover:bg-[#c6be7b] transition">Agenda</a>
        <a href="/artikel" class="bg-[#d2cc8c] rounded-full px-3 py-1 text-xs md:text-sm font-semibold shadow hover:bg-[#c6be7b] transition">Artikel</a>
        <a href="#" class="bg-[#d2cc8c] rounded-full px-3 py-1 text-xs md:text-sm font-semibold shadow hover:bg-[#c6be7b] transition">Berita</a>
        <a href="/informasi" class="bg-[#d2cc8c] rounded-full px-3 py-1 text-xs md:text-sm font-semibold shadow hover:bg-[#c6be7b] transition">Informasi</a>
      </nav>
    </div>
  </header>

  <!-- Main Artikel Section -->
  <main class="max-w-6xl mx-auto py-8 px-4">
    <h1 class="text-2xl font-bold text-center mb-6">Artikel Islam</h1>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
      <!-- Sidebar Kiri: Artikel Terbaru -->
      <aside class="md:col-span-1 col-span-1">
        <button class="bg-[#b7b36e] text-white px-4 py-2 rounded mb-4 w-full font-semibold">Artikel Terbaru</button>
        <ul class="space-y-2 text-xs md:text-sm">
          <li>Kajian Tafsir QS Al Asr: Pentingnya Waktu sebagai Amanah Ilahi</li>
          <li>Mimbar Ramadhan: Kolaborasi Negara dan Masyarakat dalam Pembentukan Masyarakat Madani</li>
          <li>Kajian Subuh Istiqal: Keutamaan Membaca Alquran di Bulan Ramadhan</li>
          <li>Hikmah: Ramadhan dan Muhasabah yang Menyapa Umat Islam</li>
        </ul>
      </aside>
      <!-- Artikel Utama dan List -->
      <section class="md:col-span-3 col-span-1">
        <div class="grid md:grid-cols-3 gap-6">
          <!-- Artikel Utama -->
          <div class="md:col-span-2 col-span-1">
            <div class="bg-white rounded-xl shadow p-4 mb-6">
              <img src="{{ asset('aset/artikel1.jpg') }}" class="w-full h-48 object-cover rounded mb-4" alt="Artikel Utama">
              <h2 class="font-bold text-lg mb-2">Meninggalkan Sesuatu Karena Allah</h2>
              <div class="text-xs text-gray-500 mb-1">Kajian Ramadhan 25: <span class="text-gray-700">Meninggalkan Sesuatu Karena Allah</span></div>
              <div class="text-xs text-gray-400">29 April 2024 &bull; 1.278x dibaca</div>
            </div>
            <!-- List Artikel -->
            <div class="space-y-4">
              <div class="flex gap-3 bg-white rounded-lg shadow p-2">
                <img src="{{ asset('aset/artikel2.jpg') }}" class="w-20 h-16 object-cover rounded" alt="Ajar Kita Turut Mensukseskan">
                <div>
                  <div class="font-semibold text-sm">Ajar Kita Turut Mensukseskan</div>
                  <div class="text-xs text-gray-500">"InsyaAllah ilmu itu seiring, sejalan dengan amal. Ilmu yang bermanfaat adalah ilmu yang diamalkan..."</div>
                </div>
              </div>
              <div class="flex gap-3 bg-white rounded-lg shadow p-2">
                <img src="{{ asset('aset/artikel3.jpg') }}" class="w-20 h-16 object-cover rounded" alt="Hikmah: Berharap Ampunan dan Rahmat Allah">
                <div>
                  <div class="font-semibold text-sm">Hikmah: Berharap Ampunan dan Rahmat Allah</div>
                  <div class="text-xs text-gray-500">29 April 2024 &bull; 1.003x dibaca</div>
                </div>
              </div>
              <div class="flex gap-3 bg-white rounded-lg shadow p-2">
                <img src="{{ asset('aset/artikel4.jpg') }}" class="w-20 h-16 object-cover rounded" alt="Khutbah Jumat: Awafa">
                <div>
                  <div class="font-semibold text-sm">Khutbah Jumat: Awafa</div>
                  <div class="text-xs text-gray-500">29 April 2024 &bull; 2.219x dibaca</div>
                </div>
              </div>
            </div>
          </div>
          <!-- Artikel Samping (Ringkasan) -->
          <div class="space-y-4">
            <div class="bg-white rounded-lg shadow p-2 flex gap-2">
              <img src="{{ asset('aset/artikel5.jpg') }}" class="w-16 h-12 object-cover rounded" alt="Fatwa Syaikh Shalih">
              <div>
                <div class="font-semibold text-xs">Fatwa Syaikh Shalih Al Fauzan Seputar Kerjasama Dengan Negara Kafir</div>
                <div class="text-[11px] text-gray-500">6 April 2015</div>
              </div>
            </div>
            <div class="bg-white rounded-lg shadow p-2 flex gap-2">
              <img src="{{ asset('aset/artikel6.jpg') }}" class="w-16 h-12 object-cover rounded" alt="Tiada Nabi Lagi Sesudah Beliau">
              <div>
                <div class="font-semibold text-xs">Tiada Nabi Lagi Sesudah Beliau</div>
                <div class="text-[11px] text-gray-500">21 Februari 2014</div>
              </div>
            </div>
            <div class="bg-white rounded-lg shadow p-2 flex gap-2">
              <img src="{{ asset('aset/artikel7.jpg') }}" class="w-16 h-12 object-cover rounded" alt="Atasi Corona dengan Bertauhid">
              <div>
                <div class="font-semibold text-xs">Atasi Corona dengan Bertauhid yang Sempurna (Bag. 4)</div>
                <div class="text-[11px] text-gray-500">6 April 2020</div>
              </div>
            </div>
            <div class="bg-white rounded-lg shadow p-2 flex gap-2">
              <img src="{{ asset('aset/artikel8.jpg') }}" class="w-16 h-12 object-cover rounded" alt="Kedudukan Ulama">
              <div>
                <div class="font-semibold text-xs">Kedudukan Ulama Di Tengah Umat</div>
                <div class="text-[11px] text-gray-500">12 Januari 2016</div>
              </div>
            </div>
            <div class="bg-white rounded-lg shadow p-2 flex gap-2">
              <img src="{{ asset('aset/artikel9.jpg') }}" class="w-16 h-12 object-cover rounded" alt="Serial 24 Alam Jin">
              <div>
                <div class="font-semibold text-xs">Serial 24 Alam Jin: Jin yang Beriman pada Al Quran</div>
                <div class="text-[11px] text-gray-500">17 September 2014</div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <!-- Footer dengan peta -->
  <footer class="mt-10 bg-[#e8e8e3] border-t border-gray-200 relative overflow-hidden">
    <img src="{{ asset('aset/imagemasjid.svg') }}" alt="Footer Background" class="absolute inset-0 w-full h-full object-cover opacity-30 pointer-events-none select-none" />
    <div class="relative max-w-6xl mx-auto py-8 px-4 grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
      <div class="flex flex-col items-center md:items-start gap-2">
        <img src="{{ asset('aset/logoMasjid.svg') }}" alt="Logo" class="w-21 h-21 object-contain">
        <p class="text-sm font-semibold">Selamat Datang Di Website Resmi Masjid Jami<br>Tangkubanperahu, Jakarta</p>
      </div>
      <div class="md:col-span-2 flex justify-center">
        <iframe src="https://www.openstreetmap.org/export/embed.html?bbox=106.833574%2C-6.208285%2C106.835574%2C-6.206285&layer=mapnik&marker=-6.207285,106.834574" class="w-full h-48 rounded-xl border border-gray-300 shadow" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </footer>
</body>
</html>
