<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;

class AdminGaleriController extends Controller
{
    public function index()
    {
        $acara = Reservasi::orderBy('tanggal_kegiatan', 'desc')->get();
        return view('admin.galeri.index', compact('acara'));
    }
}
