<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Donasi') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-700 bg-[#f5f5f2] antialiased">
    <!-- Header & Navbar -->
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
          <a href="/berita" class="bg-[#d2cc8c] rounded-full px-3 py-1 text-xs md:text-sm font-semibold shadow hover:bg-[#c6be7b] transition">Berita</a>
          <a href="/informasi" class="bg-[#d2cc8c] rounded-full px-3 py-1 text-xs md:text-sm font-semibold shadow hover:bg-[#c6be7b] transition">Informasi</a>
          <a href="/laporan-keuangan" class="bg-[#d2cc8c] rounded-full px-3 py-1 text-xs md:text-sm font-semibold shadow hover:bg-[#c6be7b] transition">Laporan-keuangan</a>
          <span id="currentTimeHome" class="font-mono text-xs text-gray-700 bg-white px-3 py-1 rounded-full ml-1"></span>

        </nav>
      </div>
    </header>

    <main class="max-w-6xl mx-auto py-8 px-4">
      <h1 class="text-2xl font-bold text-center text-green-700 mb-2">Donasi</h1>
      <div class="text-xs text-gray-800 text-center mb-6">
        Dukung keberlangsungan dan perkembangan Masjid Tangkuban Perahu dengan berdonasi. Setiap kontribusi Anda membantu dalam penyediaan fasilitas, kegiatan keagamaan, serta program sosial bagi jamaah dan masyarakat sekitar. Bersama, kita bisa menciptakan lingkungan yang lebih nyaman dan bermanfaat.
      </div>
      <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mb-8">
        <div class="flex flex-col items-center bg-[#e8e8e3] rounded-xl p-4 shadow">
          <img src="{{ asset('aset/donasi-bencana.svg') }}" alt="Bencana Alam" class="w-16 h-16 mb-2">
          <span class="font-semibold text-green-700">Bencana Alam</span>
        </div>
        <div class="flex flex-col items-center bg-[#e8e8e3] rounded-xl p-4 shadow">
          <img src="{{ asset('aset/donasi-yatim.svg') }}" alt="Yatim Piatu" class="w-16 h-16 mb-2">
          <span class="font-semibold text-green-700">Yatim Piatu</span>
        </div>
        <div class="flex flex-col items-center bg-[#e8e8e3] rounded-xl p-4 shadow">
          <img src="{{ asset('aset/donasi-infrastruktur.svg') }}" alt="Infrastruktur Masjid" class="w-16 h-16 mb-2">
          <span class="font-semibold text-green-700">Infrastruktur Masjid</span>
        </div>
        <div class="flex flex-col items-center bg-[#e8e8e3] rounded-xl p-4 shadow">
          <img src="{{ asset('aset/donasi-fakir.svg') }}" alt="Fakir Miskin" class="w-16 h-16 mb-2">
          <span class="font-semibold text-green-700">Fakir Miskin</span>
        </div>
        <div class="flex flex-col items-center bg-[#e8e8e3] rounded-xl p-4 shadow">
          <img src="{{ asset('aset/donasi-sahur.svg') }}" alt="Sahur dan Berbuka" class="w-16 h-16 mb-2">
          <span class="font-semibold text-green-700">Sahur dan Berbuka</span>
        </div>
        <div class="flex flex-col items-center bg-[#e8e8e3] rounded-xl p-4 shadow">
          <img src="{{ asset('aset/donasi-listrik.svg') }}" alt="Listrik Masjid" class="w-16 h-16 mb-2">
          <span class="font-semibold text-green-700">Listrik Masjid</span>
        </div>
      </div>
      <div class="max-w-lg mx-auto bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold mb-4 text-center">Form Donasi</h2>
        @if(session('success'))
          <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
          </div>
        @endif
        <form method="POST" action="{{ route('donasi.store') }}" enctype="multipart/form-data" class="space-y-4">
          @csrf
          <div>
            <label class="block text-sm font-medium mb-1">Nama Muzakki</label>
            <input type="text" name="nama_lengkap" class="w-full border border-gray-300 rounded px-3 py-2" required>
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Jenis Donasi</label>
            <select name="jenis_donasi" class="w-full border border-gray-300 rounded px-3 py-2" required>
              <option value="" disabled selected>Pilih Jenis Donasi</option>
              @foreach($donasi_types as $type)
                <option value="{{ $type }}">{{ $type }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Nominal (Rp)</label>
            <input type="number" name="nominal" min="1" class="w-full border border-gray-300 rounded px-3 py-2" required>
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Keterangan</label>
            <input type="text" name="keterangan" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="(opsional)">
          </div>
          <div>
            <label class="block text-sm font-medium mb-1">Upload Bukti Donasi (JPG, JPEG, PNG, PDF)</label>
            <input type="file" name="bukti_path" accept=".jpg,.jpeg,.png,.pdf" class="w-full border border-gray-300 rounded px-3 py-2">
            <span class="text-xs text-gray-500">Maksimal 2MB.</span>
          </div>
          <button type="submit" class="w-full bg-[#b7b36e] text-white font-semibold py-2 rounded mt-2 hover:bg-[#a5a15a] transition">Donasi Sekarang</button>
        </form>
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
  <div class="relative w-full">
    <button id="toggleMapFullscreen" type="button" class="absolute z-20 top-2 right-2 bg-[#d2cc8c] hover:bg-[#c6be7b] text-gray-800 px-3 py-1 rounded shadow-md text-xs font-semibold transition focus:outline-none focus:ring-2 focus:ring-yellow-400">
      <span id="fullscreenIcon">⛶</span> Fullscreen
    </button>
    <iframe id="mapFrame" src="https://www.openstreetmap.org/export/embed.html?bbox=106.833574%2C-6.208285%2C106.835574%2C-6.206285&layer=mapnik&marker=-6.207285,106.834574" class="w-full h-96 rounded-xl border border-gray-300 shadow transition-all duration-300" allowfullscreen loading="lazy"></iframe>
  </div>
</div>
      </div>
    </footer>
</body>
<script>
// Toggle fullscreen untuk map (sama seperti home.blade.php)
const toggleMapFullscreenBtn = document.getElementById('toggleMapFullscreen');
const mapFrame = document.getElementById('mapFrame');
const fullscreenIcon = document.getElementById('fullscreenIcon');

if (toggleMapFullscreenBtn && mapFrame) {
  toggleMapFullscreenBtn.addEventListener('click', function() {
    const mapContainer = mapFrame.parentElement;
    if (!document.fullscreenElement) {
      if (mapContainer.requestFullscreen) {
        mapContainer.requestFullscreen();
      } else if (mapContainer.webkitRequestFullscreen) { /* Safari */
        mapContainer.webkitRequestFullscreen();
      } else if (mapContainer.msRequestFullscreen) { /* IE11 */
        mapContainer.msRequestFullscreen();
      }
    } else {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.webkitExitFullscreen) { /* Safari */
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) { /* IE11 */
        document.msExitFullscreen();
      }
    }
  });

  document.addEventListener('fullscreenchange', function() {
    const mapContainer = mapFrame.parentElement;
    if (document.fullscreenElement === mapContainer) {
      fullscreenIcon.textContent = '🗗';
      toggleMapFullscreenBtn.innerHTML = '<span id="fullscreenIcon">🗗</span> Exit Fullscreen';
      toggleMapFullscreenBtn.classList.add('bg-yellow-300');
      // Ubah map agar benar-benar fullscreen
      mapContainer.style.position = 'fixed';
      mapContainer.style.top = '0';
      mapContainer.style.left = '0';
      mapContainer.style.width = '100vw';
      mapContainer.style.height = '100vh';
      mapContainer.style.zIndex = '9999';
      mapContainer.style.background = '#fff';
      mapFrame.style.width = '100vw';
      mapFrame.style.height = '100vh';
      mapFrame.classList.remove('rounded-xl','border','border-gray-300','shadow');
    } else {
      fullscreenIcon.textContent = '⛶';
      toggleMapFullscreenBtn.innerHTML = '<span id="fullscreenIcon">⛶</span> Fullscreen';
      toggleMapFullscreenBtn.classList.remove('bg-yellow-300');
      // Kembalikan ke semula
      mapContainer.style.position = '';
      mapContainer.style.top = '';
      mapContainer.style.left = '';
      mapContainer.style.width = '';
      mapContainer.style.height = '';
      mapContainer.style.zIndex = '';
      mapContainer.style.background = '';
      mapFrame.style.width = '';
      mapFrame.style.height = '';
      mapFrame.classList.add('rounded-xl','border','border-gray-300','shadow');
    }
  });
}

// jam di navbar
function pad(n){return n<10?'0'+n:n;}
function updateCurrentTimeHome() {
    const now = new Date();
    const jam = pad(now.getHours());
    const mnt = pad(now.getMinutes());
    const dtk = pad(now.getSeconds());
    const str = `${jam}:${mnt}:${dtk} (WIB)`;
    const el = document.getElementById('currentTimeHome');
    if(el) el.textContent = str;
}
setInterval(updateCurrentTimeHome, 1000);
updateCurrentTimeHome();
</script>
</html>
