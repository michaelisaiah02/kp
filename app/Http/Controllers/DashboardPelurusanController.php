<?php

namespace App\Http\Controllers;

use App\Models\Rekon;
use App\Models\Valin;
use Faker\Core\Color;
use Google\Service\Sheets\CellData;
use Google\Service\Sheets\ValueRange;
use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

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
            'valins' => Valin::where('id_rekon', $pelurusan->id)->pelurusan()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Valin $pelurusan)
    {
        return view('admin.dashboard.pelurusan.edit', [
            'title' => "Validasi ID Valins" . $pelurusan->id_valins,
            'valin' => Valin::where('id_valins', $pelurusan->id_valins)->first()
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
        // Cek apakah data dengan ID Valins sudah ada
        $existingData = Sheets::spreadsheet('1Zb77WIumXAhmLgkLqZ3oeSzhVDQLuOhrR513fDOirj4')
            ->sheet(strtoupper($pelurusan->rekon->bulan))
            ->get();
        $headers = $existingData->pull(0);
        array_splice($headers, 5, 1);
        array_splice($headers, 6, 2);
        foreach ($existingData as $value) {
            array_splice($value, 5, 1);
            array_splice($value, 6, 2);
            $dat[] = $value;
        }
        $valins = Sheets::collection(header: $headers, rows: $dat);
        $valins = array_values($valins->toArray());

        // Temukan indeks baris yang cocok dengan ID Valins
        $rowIndex = null;
        foreach ($valins as $index => $valin) {
            if ($valin['ID VALINS'] == $pelurusan->id_valins) {
                $rowIndex = $index + 2;
                break;
            }
        }
        // Jika data sudah ada, lakukan pembaruan
        if ($rowIndex !== null) {
            Sheets::spreadsheet('1Zb77WIumXAhmLgkLqZ3oeSzhVDQLuOhrR513fDOirj4')
                ->sheet(strtoupper($pelurusan->rekon->bulan))
                ->range("A" . $rowIndex . ":M" . $rowIndex)
                ->update(
                    [[now()->format('m/d/Y H:i:s'), strtoupper($pelurusan->witel->witel), $pelurusan->id_valins, $pelurusan->gambar1, $pelurusan->gambar2, '', $pelurusan->gambar3, '', '', $request->ram3, strtoupper($pelurusan->rekon->bulan), $request->keterangan, auth()->user()->name]]
                );
        } else {
            // Jika data belum ada, tambahkan data baru
            Sheets::spreadsheet('1Zb77WIumXAhmLgkLqZ3oeSzhVDQLuOhrR513fDOirj4')
                ->sheet(strtoupper($pelurusan->rekon->bulan))
                ->append([
                    ['TIMESTAMP' => now()->format('m/d/Y H:i:s'), 'WITEL' => strtoupper($pelurusan->witel->witel), 'ID VALINS' => $pelurusan->id_valins, 'Upload Eviden Web Valins' => $pelurusan->gambar1, 'Tambahan Eviden Web Valins' => $pelurusan->gambar2, 'Eviden Tambahan Untuk Pelanggan Non Indihome / Dinas' => $pelurusan->gambar3, 'RAM3' => $request->ram3, 'REKON' => strtoupper($pelurusan->rekon->bulan), 'KET' => $request->keterangan, 'Eksekutor' => auth()->user()->name]
                ]);
        }
        $valin = Valin::where('id_rekon', $pelurusan->id_rekon)->pelurusan()->inRandomOrder()->first();
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
