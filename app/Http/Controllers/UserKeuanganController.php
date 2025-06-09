<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanKeuangan;

class UserKeuanganController extends Controller
{
    public function index()
    {
        // Ambil semua data laporan
        $laporans = LaporanKeuangan::orderBy('tanggal', 'asc')->get();

        // Saldo awal bisa kamu set manual atau ambil dari tabel khusus saldo
        $saldoAwal = 5000000; // misalnya Rp 5 juta sebagai saldo awal

        // Hitung pemasukan dan pengeluaran
        $pemasukan = $laporans->where('jenis', 'pemasukan')->sum('jumlah');
        $pengeluaran = $laporans->where('jenis', 'pengeluaran')->sum('jumlah');

        // Hitung saldo akhir
        $saldoAkhir = $saldoAwal + $pemasukan - $pengeluaran;

        // Kirim semua variabel ke view
        return view('layouts.laporan-keuangan', compact(
            'laporans',
            'saldoAwal',
            'pemasukan',
            'pengeluaran',
            'saldoAkhir'
        ));
    }
}
