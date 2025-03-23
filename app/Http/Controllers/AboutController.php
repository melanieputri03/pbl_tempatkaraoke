<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $nama = "Mikkeu";
        $deskripsi = "Ini adalah halaman About yang menjelaskan tentang website kami.";

        return view('about', compact('nama', 'deskripsi'));
    }
}
