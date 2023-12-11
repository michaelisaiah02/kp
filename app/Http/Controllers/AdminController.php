<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index', [
            'title' => 'Dashboard',
            'user' => Auth::user()->name
        ]);
    }

    public function bantuan()
    {
        return view('admin.bantuan', [
            'title' => 'Bantuan',
            'user' => Auth::user()->name
        ]);
    }

    public function profile()
    {
        return view('admin.profile', [
            'title' => 'Detail Profil' . Auth::user()->name,
        ]);
    }
}
