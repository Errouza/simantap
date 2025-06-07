<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Home') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
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
        <a href="/berita" class="bg-[#d2cc8c] rounded-full px-3 py-1 text-xs md:text-sm font-semibold shadow hover:bg-[#a5a15a] transition font-bold">Berita</a>
        <a href="/informasi" class="bg-[#d2cc8c] rounded-full px-3 py-1 text-xs md:text-sm font-semibold shadow hover:bg-[#c6be7b] transition">Informasi</a>
        <a href="/laporan-keuangan" class="bg-[#d2cc8c] rounded-full px-3 py-1 text-xs md:text-sm font-semibold shadow hover:bg-[#c6be7b] transition">Laporan-keuangan</a>

        <span id="currentTimeHome" class="font-mono text-xs text-gray-700 bg-white px-3 py-1 rounded-full ml-1"></span>
      </nav>
    </div>
  </header>


        <!-- Sidebar kanan: Jadwal Sholat & Event (kecil di samping kalender) -->
        <aside class="md:col-span-1 col-span-1 flex flex-col gap-6 md:sticky md:top-8">
          <!-- Jadwal Sholat (bisa tambahkan di sini jika perlu) -->
          
          <!-- Event Kecil -->
      

      <!-- Kalender -->
      <!-- Grid utama: Event (kiri) - Kalender (tengah) - Jadwal Sholat (kanan) -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-6">
        <!-- Sidebar Kiri: Event -->
        <aside class="md:col-span-1 col-span-1 flex flex-col gap-6 md:sticky md:top-8">
          <div class="bg-yellow-100 rounded-xl shadow p-3">
            <h3 class="font-bold text-base mb-3 text-center text-gray-700">Events</h3>
            <div class="space-y-3">
              <div class="flex gap-2 items-center bg-white rounded-lg shadow p-2">
                <img src="{{ asset('aset/image2.svg') }}" class="w-12 h-12 object-cover rounded" alt="Event 1">
                <div>
                  <div class="font-semibold text-xs">Mimbar Ramadhan</div>
                  <div class="text-[11px] text-gray-500 leading-tight">Kolaborasi Negara dan Masyarakat dalam Pembentukan Masyarakat Madani</div>
                </div>
              </div>
              <div class="flex gap-2 items-center bg-white rounded-lg shadow p-2">
                <img src="{{ asset('aset/image4.svg') }}" class="w-12 h-12 object-cover rounded" alt="Event 2">
                <div>
                  <div class="font-semibold text-xs">Makin Berulah!</div>
                  <div class="text-[11px] text-gray-500 leading-tight">Usai Blokir Bantuan, Kini Zionis Israel Putus Pasokan Listrik Gaza</div>
                </div>
              </div>
            </div>
          </div>
        </aside>
        <!-- Kalender (Tengah) -->
        <div class="md:col-span-2 col-span-1">
          <div class="bg-white rounded-xl shadow p-6">
            <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2">
            </div>
          </div>
          <div id="calendar"></div>
          </div>
        </div>
        <!-- Sidebar Kanan: Jadwal Sholat -->
        <aside class="md:col-span-1 col-span-1 flex flex-col gap-6 md:sticky md:top-8">
          @include('layouts.sholat')
        </aside>
      </div>

      <!-- Layanan -->
      <div class="mt-8">
        <h2 class="text-center text-lg font-bold mb-4">Layanan</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-6 text-center text-sm">
          <a href="/mualaf">
            <img src="{{ asset('aset/mualafs.svg') }}" class="mx-auto w-24 h-24 hover:scale-105 transition" alt="Muallaf Center">
            <div class="mt-2 text-black hover:underline">Muallaf Center</div>
          </a>
          <a href="/reservasi">
            <img src="{{ asset('aset/aula.svg') }}" class="mx-auto w-24 h-24 hover:scale-105 transition" alt="Reservasi Aula">
            <div class="mt-2 text-black hover:underline">Reservasi Aula</div>
          </a>
          <a href="/konsultasi">
            <img src="{{ asset('aset/konsul.svg') }}" class="mx-auto w-24 h-24 hover:scale-105 transition" alt="Konsultasi">
            <div class="mt-2 text-black hover:underline">Konsultasi</div>
          </a>
          <a href="/donasi">
            <img src="{{ asset('aset/donasi.svg') }}" class="mx-auto w-24 h-24 hover:scale-105 transition" alt="Donasi Online">
            <div class="mt-2 text-black hover:underline">Donasi Online</div>
          </a>
          <a href="{{ route('zakat') }}">
            <img src="{{ asset('aset/zakat.svg') }}" class="mx-auto w-24  h-24 hover:scale-105 transition" alt="Unit Zakat">
            <div class="mt-2 text-black hover:underline">Unit Pelayanan Zakat</div>
          </a>
          <a href="/galeri">
            <img src="{{ asset('aset/galeri.svg') }}" class="mx-auto w-24 h-24 hover:scale-105 transition" alt="Galeri Masjid">
            <div class="mt-2 text-black hover:underline">Galeri Masjid</div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer dengan peta -->
  <footer class="mt-10 bg-[#e8e8e3] border-t border-gray-200 relative overflow-hidden">
    <img src="{{ asset('aset/imagemasjid.svg') }}" alt="Footer Background" class="absolute inset-0 w-full h-full object-cover opacity-30 pointer-events-none select-none" />
    <div class="relative max-w-6xl mx-auto py-8 px-4 grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
      <div class="flex flex-col items-center md:items-start gap-2">
        <img src="{{ asset('aset/logoMasjid.svg') }}" alt="Logo" class="w-21 h-21 object-contain">
        <p class="text-sm font-semibold">Selamat Datang Di Website Resmi Masjid Jami<br>Tangkubanperahu, Jakarta</p>
        <a href="/login" class="ml-2 bg-[#232323] text-white px-2 py-1 rounded text-xs font-semibold hover:bg-[#4b4b2e] transition shadow">Admin</a>

      </div>
      <div class="md:col-span-2 flex justify-center">
      <div class="relative w-full">
        <button id="toggleMapFullscreen" type="button" class="absolute z-20 top-2 right-2 bg-[#d2cc8c] hover:bg-[#c6be7b] text-gray-800 px-3 py-1 rounded shadow-md text-xs font-semibold transition focus:outline-none focus:ring-2 focus:ring-yellow-400">
          <span id="fullscreenIcon">⛶</span> Fullscreen
        </button>
        <iframe id="mapFrame" src="https://www.openstreetmap.org/export/embed.html?bbox=106.833574%2C-6.208285%2C106.835574%2C-6.206285&amp;layer=mapnik&amp;marker=-6.207285,106.834574" class="w-full h-96 rounded-xl border border-gray-300 shadow transition-all duration-300" allowfullscreen loading="lazy"></iframe>
      </div>
    </div>
  </footer>
<script>
// Kalender Dinamis Vanilla JS
const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
const dayNames = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
let today = new Date();
let currentMonth = today.getMonth();
let currentYear = today.getFullYear();

function renderCalendar(month, year) {
  const calendar = document.getElementById('calendar');
  if (!calendar) return;
  // Header
  let html = `<div class='flex items-center justify-between mb-4'>
    <button id='prevMonth' class='p-2 bg-[#d2cc8c] rounded hover:bg-[#c6be7b]'><svg xmlns='http://www.w3.org/2000/svg' class='w-4 h-4' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 19l-7-7 7-7' /></svg></button>
    <div class='text-lg md:text-xl font-bold text-gray-800'>${monthNames[month]} <span class='font-normal'>${year}</span></div>
    <button id='nextMonth' class='p-2 bg-[#d2cc8c] rounded hover:bg-[#c6be7b]'><svg xmlns='http://www.w3.org/2000/svg' class='w-4 h-4' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 5l7 7-7 7' /></svg></button>
  </div>`;
  // Days header
  html += "<div class='grid grid-cols-7 text-center text-xs md:text-sm font-semibold text-gray-600 mb-1'>";
  for (let d of dayNames) html += `<div>${d}</div>`;
  html += "</div>";
  // Dates
  html += "<div class='grid grid-cols-7 gap-1 text-center text-xs md:text-sm'>";
  let firstDay = new Date(year, month, 1).getDay();
  let daysInMonth = new Date(year, month + 1, 0).getDate();
  let prevMonthDays = new Date(year, month, 0).getDate();
  // Previous month days
  for (let i = 0; i < firstDay; i++) {
    html += `<div class='text-gray-300'>${prevMonthDays - firstDay + i + 1}</div>`;
  }
  // Current month days
  for (let d = 1; d <= daysInMonth; d++) {
    let isToday = d === today.getDate() && month === today.getMonth() && year === today.getFullYear();
    html += `<div class='${isToday ? "text-gray-500 bg-gray-100 rounded font-bold border-2 border-yellow-500" : "bg-gray-200 rounded"}'>${d}</div>`;
  }
  // Next month days
  let totalCells = firstDay + daysInMonth;
  for (let i = 0; i < (7 - (totalCells % 7)) % 7; i++) {
    html += `<div class='text-gray-300'>${i + 1}</div>`;
  }
  html += "</div>";
  calendar.innerHTML = html;
  document.getElementById('prevMonth').onclick = () => {
    currentMonth--;
    if (currentMonth < 0) { currentMonth = 11; currentYear--; }
    renderCalendar(currentMonth, currentYear);
  };
  document.getElementById('nextMonth').onclick = () => {
    currentMonth++;
    if (currentMonth > 11) { currentMonth = 0; currentYear++; }
    renderCalendar(currentMonth, currentYear);
  };
  // Hari ini button
  const todayBtn = document.querySelector('button.bg-\[\#d2cc8c\].text-sm');
  if (todayBtn) {
    todayBtn.onclick = () => {
      currentMonth = today.getMonth();
      currentYear = today.getFullYear();
      renderCalendar(currentMonth, currentYear);
    };
  }
}
document.addEventListener('DOMContentLoaded', () => {
  renderCalendar(currentMonth, currentYear);
});
// Toggle fullscreen untuk map
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

// function untuk update time
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
</body>
</html>