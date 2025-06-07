<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'zakat') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-700 bg-[#f5f5f2] antialiased">
    <!-- Header & Navbar -->
    <header class="bg-white shadow-sm">
      <div class="max-w-6xl mx-auto flex items-center justify-between py-2 px-4">
        <div class="flex items-center gap-3">
          <a href="/home" class="flex items-center gap-3  ">
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
          <span id="currentTimeHome" class="font-mono text-xs text-gray-700 bg-white px-3 py-1 rounded-full ml-1"></span>

        </nav>
      </div>
    </header>

<div class="max-w-4xl mx-auto py-8 px-2">
    <div class="bg-white rounded-xl shadow p-8">
        <h2 class="text-2xl md:text-3xl font-bold text-center text-[#258a46] mb-2">Kalkulator Zakat</h2>
        <p class="text-center text-gray-600 text-sm mb-6">
            Kalkulator zakat adalah layanan untuk mempermudah perhitungan jumlah zakat yang harus ditunaikan oleh setiap umat muslim sesuai ketetapan syariah. Oleh karena itu, bagi Anda yang ingin mengetahui berapa jumlah zakat yang harus ditunaikan, silakan gunakan fasilitas Kalkulator Zakat SIMANTAP di bawah ini.
        </p>
        <div class="max-w-xl mx-auto">
            <h4 class="text-xl font-semibold text-[#2eaf68] text-center mb-4">Jenis Zakat</h4>
            <div class="flex justify-center mb-3">
                <select class="border border-gray-300 rounded-full px-6 py-2 focus:ring-2 focus:ring-[#2eaf68] text-center" id="jenisZakat">
                    <option selected>PENGHASILAN</option>
                    <!-- Tambahkan jenis zakat lain jika diperlukan -->
                </select>
            </div>
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-3 mb-6 text-gray-700 text-xs rounded">
                Zakat penghasilan atau yang dikenal juga sebagai zakat profesi adalah bagian dari zakat mal yang wajib dikeluarkan atas harta yang berasal dari pendapatan / penghasilan rutin dari pekerjaan yang tidak melanggar syariah. Nisab penghasilan sebesar emas 85 gram emas per tahun. Kadar zakat penghasilan adalah sebesar 2,5%. Dalam perhitungannya, zakat penghasilan dapat dihitung dari pendapatan kotor (bruto) atau pendapatan bersih (netto). Jika penghasilan setiap bulan sudah melebihi nisab dan haul (85 gr/tahun, emas harga 1gr), kadar zakatnya 2,5%. Jika jumlah penghasilan setiap bulan tidak melebihi nisab setelah dihitung bulanan, maka wajib dibayarkan zakatnya sebesar 2,5% dari pendapatan tersebut.
            </div>
            <form class="space-y-4">
                <div>
                    <label for="gaji" class="block font-medium text-sm mb-1">Gaji per bulan</label>
                    <input type="number" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2eaf68]" id="gaji" placeholder="Rp.">
                </div>
                <div>
                    <label for="lain" class="block font-medium text-sm mb-1">Penghasilan Lain-Lain</label>
                    <input type="number" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2eaf68]" id="lain" placeholder="Rp.">
                </div>
                <div>
                    <label for="total" class="block font-medium text-sm mb-1">Jumlah Penghasilan per bulan</label>
                    <input type="number" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2eaf68]" id="total" placeholder="Rp.">
                </div>
                <div>
                    <label for="nisabTahun" class="block font-medium text-sm mb-1">Nisab per tahun</label>
                    <input type="number" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#2eaf68]" id="nisabTahun" placeholder="Rp.">
                </div>
                <div class="flex justify-between gap-4 pt-2">
                    <button type="reset" class="flex-1 bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2 rounded-lg shadow transition">Reset</button>
                    <button id="btnHitung" type="button" class="flex-1 bg-green-800 hover:bg-green-900 text-white font-semibold py-2 rounded-lg shadow transition">Hitung Zakat</button>
                </div>
            </form>
             <div id="hasilZakat" class="mt-6 text-center text-green-700 font-bold text-lg hidden"></div>
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

 document.getElementById("btnHitung").addEventListener("click", function () {
      const gaji = parseFloat(document.getElementById("gaji").value) || 0;
      const lain = parseFloat(document.getElementById("lain").value) || 0;
      const total = gaji + lain;
      const nisabTahun = parseFloat(document.getElementById("nisabTahun").value) || 0;
      const nisabBulanan = nisabTahun / 12;

      document.getElementById("total").value = total;

      const hasilElem = document.getElementById("hasilZakat");

      if (total >= nisabBulanan) {
        const zakat = total * 0.025;
        hasilElem.innerHTML = `✅ <strong>Wajib Zakat</strong><br>2.5% x Rp ${total.toLocaleString('id-ID')} = <strong>Rp ${zakat.toLocaleString('id-ID')}</strong>`;
      } else {
        hasilElem.innerHTML = `❌ <strong>Tidak Wajib Zakat</strong><br>Karena penghasilan Rp ${total.toLocaleString('id-ID')} < nisab bulanan Rp ${nisabBulanan.toLocaleString('id-ID')}`;
      }

      hasilElem.classList.remove("hidden");
    });

    function resetForm() {
      document.getElementById("hasilZakat").classList.add("hidden");
      document.getElementById("hasilZakat").innerHTML = "";
    }
</script>
</html>