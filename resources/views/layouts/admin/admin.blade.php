<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Masjid Jami Tangkubanperahu</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-700 bg-gray-100 antialiased">
    <header class="bg-[#232323] shadow-sm">
      <div class="max-w-7xl mx-auto flex items-center justify-between py-3 px-6">
        <div class="flex items-center gap-3">
          <img src="{{ asset('aset/logoMasjid.svg') }}" alt="Logo" class="w-12 h-12 object-contain">
          <span class="text-xl font-bold text-white">Admin Masjid Jami Tangkubanperahu</span>
        </div>
        <nav class="flex gap-3">
          <a href="/admin" class="text-white font-semibold hover:underline">Dashboard</a>
          <a href="/admin/artikel" class="text-white font-semibold hover:underline">Artikel</a>
          <a href="/admin/galeri" class="text-white font-semibold hover:underline">Galeri</a>
          <a href="/admin/konsultasi" class="text-white font-semibold hover:underline">Konsultasi</a>
          <a href="/admin/reservasi" class="text-white font-semibold hover:underline">Reservasi</a>
          <a href="/" class="text-red-400 font-semibold hover:underline">Logout</a>
        </nav>
      </div>
    </header>

    <main class="max-w-7xl mx-auto py-8 px-4 min-h-[70vh]">
      @yield('content')
    </main>

    <footer class="bg-[#232323] text-white text-center py-4 mt-10">
      &copy; {{ date('Y') }} Admin Panel Masjid Jami Tangkubanperahu
    </footer>
</body>
</html>
