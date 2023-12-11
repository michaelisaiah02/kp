<?php

namespace App\Http\Controllers;

use App\Models\Rekon;
use App\Models\Valin;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class DashboardPelurusanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('validator');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard.pelurusan.index', [
            'title' => "Pelurusan",
            'rekons' => Rekon::all()
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
    public function show(Rekon $pelurusan)
    {
        return view('admin.dashboard.pelurusan.show', [
            'title' => "Rekon " . $pelurusan->bulan,
            'rekon' => $pelurusan->bulan,
            'valins' => Valin::latest()->where('id_rekon', $pelurusan->id)->pelurusan()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Valin $pelurusan)
    {
        return view('admin.dashboard.pelurusan.edit', [
            'title' => "Validasi ID Valins" . $pelurusan->id_valins,
            'valin' => Valin::latest()->where('id_valins', $pelurusan->id_valins)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Valin $pelurusan)
    {
        $validatedData = $request->validate([
            'ram3' => 'required',
            'keterangan' => 'required'
        ], [
            'ram3.required' => 'Validasi harus dipilih!',
            'keterangan.required' => 'Keterangan harus dipilih!'
        ]);
        Valin::where('id', $pelurusan->id)->update($validatedData);

        $valin = Valin::where('id_rekon', $pelurusan->id_rekon)->pelurusan()->first();
        if ($request->selesai == 0 && !is_null($valin)) {
            return redirect('/admin/dashboard/pelurusan/' . $valin->id_valins . '/edit')->with('success', 'Data dengan ID Valins -> ' . $pelurusan->id_valins . ' berhasil divalidasi!');
        } else {
            if (is_null($valin)) {
                return redirect('/admin/dashboard/pelurusan/' . $pelurusan->rekon->bulan)->with('success', 'Data dengan ID Valins -> ' . $pelurusan->id_valins . ' berhasil divalidasi! Rekon bulan ' . $pelurusan->rekon->bulan . ' sudah tervalidasi semua. Terima kasih.');
            } else {
                return redirect('/admin/dashboard/pelurusan/' . $pelurusan->rekon->bulan)->with('success', 'Data dengan ID Valins -> ' . $pelurusan->id_valins . ' berhasil divalidasi!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Valin $valin)
    {
        //
    }
}
