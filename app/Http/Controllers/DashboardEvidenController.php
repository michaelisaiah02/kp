<?php

namespace App\Http\Controllers;

use App\Models\Valin;
use App\Models\Witel;
use Illuminate\Http\Request;

class DashboardEvidenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('manager');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard.eviden.index', [
            'title' => 'Daftar Witel',
            'witels' => Witel::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Witel $eviden)
    {
        return view("admin.dashboard.eviden.show", [
            "title" => "Eviden Witel " . $eviden->witel,
            "witel" => $eviden->witel,
            "valins" => Valin::latest()
                ->where('id_witel', $eviden->id)
                ->eviden()
                ->filter(request(['cari']))
                ->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Valin $eviden)
    {
        return view('admin.dashboard.eviden.edit', [
            'title' => 'Edit Eviden Witel ' . $eviden->id_valins,
            'valin' => Valin::where('id_valins', $eviden->id_valins)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Valin $valin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Valin $valin)
    {
        //
    }
}
