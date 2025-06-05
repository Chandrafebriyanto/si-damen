<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landing()
    {
        return view('landing');
    }

    public function cuaca()
    {
        // Halaman ini sebagian besar sisi klien, cukup kembalikan view
        return view('cuaca');
    }

    public function kalender()
    {
        // Halaman ini akan mengambil data melalui API, cukup kembalikan view
        return view('kalender');
    }
}