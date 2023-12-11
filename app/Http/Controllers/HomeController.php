<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getLoggedInUserName()
    {
        // Memeriksa apakah pengguna sudah login
        if (Auth::check()) {
            // Mengambil nama pengguna yang sedang login
            $userName = Auth::user()->name;

            // Mengembalikan nama pengguna
            return $userName;
        } else {
            // Jika pengguna tidak login, mengembalikan nilai default atau pesan
            return "Akun";
        }
    }

    // Ambil data dari request
    public function index()
    {
        return view('index', [
            "title" => "Valins",
            "background" => "bg-1",
            "user" => $this->getLoggedInUserName()
        ]);
    }
}
