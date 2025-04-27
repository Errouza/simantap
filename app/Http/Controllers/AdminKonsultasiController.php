<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Http\Request;

class AdminKonsultasiController extends Controller
{
    public function index()
    {
        $konsultasis = Konsultasi::latest()->get();
        return view('admin.konsultasi.index', compact('konsultasis'));
    }
}
