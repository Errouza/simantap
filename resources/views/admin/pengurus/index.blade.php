<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Manajemen Pendaftaran Pengurus') }}
            </h2>
        </div>
    </x-slot>
    <div class="max-w-2xl mx-auto mt-8 bg-white p-6 rounded shadow">
        <div class="mb-4">
            <p class="text-lg font-semibold mb-2">Pendaftaran Pengurus Masjid</p>
            <p class="mb-4">Untuk melakukan pendaftaran pengurus, silakan klik tombol di bawah ini untuk mengisi Google Form resmi pendaftaran pengurus Masjid Jami Tangkubanperahu.</p>
            <a href="https://forms.gle/your-google-form-link" target="_blank" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 font-semibold transition">Isi Formulir Pendaftaran Pengurus</a>
        </div>
    </div>
</x-app-layout>
