<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPengurusController extends Controller
{
    public function index()
    {
        return view('admin.pengurus.index');
    }
}
