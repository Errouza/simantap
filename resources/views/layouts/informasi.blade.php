<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Informasi Mualaf') }}</title>
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
      <h1 class="text-2xl font-bold text-center mb-6">Daftar Data Mualaf</h1>
      <div class="overflow-x-auto bg-white rounded-xl shadow p-4 mb-8">
        <table class="min-w-full divide-y divide-gray-200 text-xs md:text-sm">
          <thead class="bg-[#e8e8e3]">
            <tr>
              <th class="px-2 py-2 font-semibold">No</th>
              <th class="px-2 py-2 font-semibold">Nama Lengkap</th>
              <th class="px-2 py-2 font-semibold">No HP</th>
              <th class="px-2 py-2 font-semibold">Email</th>
              <th class="px-2 py-2 font-semibold">Alamat</th>
              <th class="px-2 py-2 font-semibold">Tanggal Kegiatan</th>
              <th class="px-2 py-2 font-semibold">Waktu</th>
              <th class="px-2 py-2 font-semibold">Catatan</th>
              <th class="px-2 py-2 font-semibold">Persetujuan</th>
              <th class="px-2 py-2 font-semibold">Kesediaan</th>
              <th class="px-2 py-2 font-semibold">Tanggal Daftar</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            @forelse($mualafs as $mualaf)
            <tr>
              <td class="px-2 py-2">{{ $loop->iteration }}</td>
              <td class="px-2 py-2">{{ $mualaf->nama_lengkap }}</td>
              <td class="px-2 py-2">{{ $mualaf->nomor_hp }}</td>
              <td class="px-2 py-2">{{ $mualaf->email }}</td>
              <td class="px-2 py-2">{{ $mualaf->alamat }}</td>
              <td class="px-2 py-2">{{ $mualaf->tanggal_kegiatan }}</td>
              <td class="px-2 py-2">{{ $mualaf->waktu_kegiatan }}</td>
              <td class="px-2 py-2">{{ $mualaf->catatan }}</td>
              <td class="px-2 py-2">{{ $mualaf->persetujuan ? 'Ya' : 'Tidak' }}</td>
              <td class="px-2 py-2 capitalize">{{ $mualaf->kesediaan }}</td>
              <td class="px-2 py-2">{{ $mualaf->created_at->format('d-m-Y H:i') }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="11" class="text-center py-4 text-gray-500">Belum ada data mualaf.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <h1 class="text-2xl font-bold text-center mb-6">Daftar Reservasi Aula</h1>
      <div class="overflow-x-auto bg-white rounded-xl shadow p-4 mb-8">
        <table class="min-w-full divide-y divide-gray-200 text-xs md:text-sm">
          <thead class="bg-[#e8e8e3]">
            <tr>
              <th class="px-2 py-2 font-semibold">No</th>
              <th class="px-2 py-2 font-semibold">Nama Lengkap</th>
              <th class="px-2 py-2 font-semibold">No HP</th>
              <th class="px-2 py-2 font-semibold">Email</th>
              <th class="px-2 py-2 font-semibold">Instansi</th>
              <th class="px-2 py-2 font-semibold">Alamat</th>
              <th class="px-2 py-2 font-semibold">Kegiatan</th>
              <th class="px-2 py-2 font-semibold">Pengantin Pria</th>
              <th class="px-2 py-2 font-semibold">Pengantin Wanita</th>
              <th class="px-2 py-2 font-semibold">Tanggal Kegiatan</th>
              <th class="px-2 py-2 font-semibold">Jumlah Peserta</th>
              <th class="px-2 py-2 font-semibold">Waktu</th>
              <th class="px-2 py-2 font-semibold">File KTP/SK</th>
              <th class="px-2 py-2 font-semibold">Persetujuan</th>
              <th class="px-2 py-2 font-semibold">Kesediaan</th>
              <th class="px-2 py-2 font-semibold">Tanggal Daftar</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            @forelse($reservasis as $reservasi)
            <tr>
              <td class="px-2 py-2">{{ $loop->iteration }}</td>
              <td class="px-2 py-2">{{ $reservasi->nama_lengkap }}</td>
              <td class="px-2 py-2">{{ $reservasi->nomor_hp }}</td>
              <td class="px-2 py-2">{{ $reservasi->email }}</td>
              <td class="px-2 py-2">{{ $reservasi->instansi }}</td>
              <td class="px-2 py-2">{{ $reservasi->alamat }}</td>
              <td class="px-2 py-2">
                @foreach(json_decode($reservasi->nama_kegiatan, true) ?? [] as $kegiatan)
                  <span class="inline-block bg-[#d2cc8c] rounded px-2 py-1 mr-1 mb-1">{{ $kegiatan }}</span>
                @endforeach
              </td>
              <td class="px-2 py-2">{{ $reservasi->nama_pengantin_pria }}</td>
              <td class="px-2 py-2">{{ $reservasi->nama_pengantin_wanita }}</td>
              <td class="px-2 py-2">{{ $reservasi->tanggal_kegiatan }}</td>
              <td class="px-2 py-2">{{ $reservasi->jumlah_peserta }}</td>
              <td class="px-2 py-2">{{ $reservasi->waktu_kegiatan }}</td>
              <td class="px-2 py-2">
                @if($reservasi->ktp_path)
                  <a href="{{ asset('storage/'.$reservasi->ktp_path) }}" target="_blank" class="text-blue-600 underline">Lihat File</a>
                @else
                  -
                @endif
              </td>
              <td class="px-2 py-2">{{ $reservasi->persetujuan ? 'Ya' : 'Tidak' }}</td>
              <td class="px-2 py-2 capitalize">{{ $reservasi->kesediaan }}</td>
              <td class="px-2 py-2">{{ $reservasi->created_at->format('d-m-Y H:i') }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="16" class="text-center py-4 text-gray-500">Belum ada data reservasi aula.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <h1 class="text-2xl font-bold text-center mb-6">Daftar Donasi</h1>
      <div class="overflow-x-auto bg-white rounded-xl shadow p-4 mb-8">
        <table class="min-w-full divide-y divide-gray-200 text-xs md:text-sm">
          <thead class="bg-[#e8e8e3]">
            <tr>
              <th class="px-2 py-2 font-semibold">No</th>
              <th class="px-2 py-2 font-semibold">Nama Lengkap</th>
              <th class="px-2 py-2 font-semibold">Jenis Donasi</th>
              <th class="px-2 py-2 font-semibold">Nominal</th>
              <th class="px-2 py-2 font-semibold">Keterangan</th>
              <th class="px-2 py-2 font-semibold">Bukti Donasi</th>
              <th class="px-2 py-2 font-semibold">Tanggal Donasi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            @forelse($donasis as $donasi)
            <tr>
              <td class="px-2 py-2">{{ $loop->iteration }}</td>
              <td class="px-2 py-2">{{ $donasi->nama_lengkap }}</td>
              <td class="px-2 py-2">{{ $donasi->jenis_donasi }}</td>
              <td class="px-2 py-2">Rp{{ number_format($donasi->nominal, 0, ',', '.') }}</td>
              <td class="px-2 py-2">{{ $donasi->keterangan }}</td>
              <td class="px-2 py-2">
                @if($donasi->bukti_path)
                  <a href="{{ asset('storage/'.$donasi->bukti_path) }}" target="_blank" class="text-blue-600 underline">Lihat Bukti</a>
                @else
                  -
                @endif
              </td>
              <td class="px-2 py-2">{{ $donasi->created_at->format('d-m-Y H:i') }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data donasi.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
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
