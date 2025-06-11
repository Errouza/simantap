<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $acara = Galeri::orderBy('tanggal_kegiatan', 'desc')->get();
        return view('layouts.galeri', compact('acara'));
    }
}
