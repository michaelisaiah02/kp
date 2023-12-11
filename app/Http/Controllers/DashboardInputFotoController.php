<?php

namespace App\Http\Controllers;

use App\Models\Rekon;
use App\Models\Valin;
use App\Models\Witel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardInputFotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('teknisi');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard.input_foto.index', [
            'title' => 'Input Foto',
            'witels' => Witel::all(),
            'valins' => Valin::where('id_user', Auth::user()->id)->latest()->paginate(5),
            'rekons' => Rekon::all()
        ]);;
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
        $validatedData = $request->validate([
            'gambar' => 'required|array|max:3',
            'gambar.*' => 'image|file|mimes:jpeg,png,jpg,webp|max:2048',
            'id_valins' => 'required|unique:valins,id_valins|string|size:8',
            'id_witel' => 'required',
            'id_rekon' => 'required'
        ], [
            'gambar.required' => 'Harus ada gambar yang diupload minimal 1!',
            'gambar.max' => 'Gambar yang diupload maksimal 3!',
            'gambar.*.image' => 'Foto gagal diunggah. Pastikan semua file yang diunggah berupa gambar!',
            'gambar.*.mimes' => 'Format file tidak didukung. Harap unggah file dengan format jpeg, png, jpg, atau webp!',
            'gambar.*.max' => 'Ukuran file terlalu besar. Maksimal ukuran file adalah 2 MB!',
            'id_valins.size' => 'Panjang ID Valins harus 8 karakter!',
            'id_valins.unique' => 'ID Valins yang dimasukan sudah ada sebelumnya!',
            'id_valins.required' => 'ID Valins harus diisi!',
            'id_witel.required' => 'Witel harus dipilih!',
            'id_rekon.required' => 'Rekon harus dipilih!'
        ]);
        if ($request->file('gambar')) {
            for ($i = 0; $i < count($validatedData['gambar']); $i++) {
                switch ($request->file('gambar')[$i]->getClientMimeType()) {
                    case 'image/jpeg':
                        $ekstensi = '.jpg';
                        break;
                    case 'image/png':
                        $ekstensi = '.png';
                        break;
                    case 'image/webp':
                        $ekstensi = '.webp';
                        break;
                    default:
                        $ekstensi = '.image';
                        break;
                }
                $validatedData['gambar' . $i + 1] = $request->file('gambar')[$i]->storeAs('foto-odp', $request->id_valins . '_' . $i + 1 . $ekstensi);
            }
            unset($validatedData['gambar']);
        }
        $validatedData['id_user'] = Auth::user()->id;
        Valin::create($validatedData);
        return redirect('/admin/dashboard/input_foto')->with('success', 'Foto berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Valin $input_foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Valin $input_foto)
    {
        // Mengambil data yang dibutuhkan untuk pengisian modal
        // Sesuaikan dengan struktur data yang Anda perlukan
        $data = [
            'gambar' => [
                'gambar1' => $input_foto->gambar1,
                'gambar2' => $input_foto->gambar2,
                'gambar3' => $input_foto->gambar3
            ],
            'id_valins' => $input_foto->id_valins,
            'id_witel' => $input_foto->id_witel,
            'id_rekon' => $input_foto->id_rekon,
            'witel' => $input_foto->witel->witel,
            'rekon' => $input_foto->rekon->bulan,
            'kondisi' => strtotime(now()) - strtotime($input_foto->created_at) < 86400
        ];

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Valin $input_foto)
    {
        // Tambah Foto
        if ($request->_method == "patch" && $request->metode == "tambah") {
            $batasan = 0;
            $gambar1 = false;
            $gambar2 = false;
            $gambar3 = false;
            if ($input_foto->gambar1 == null) {
                $batasan += 1;
            }
            if ($input_foto->gambar2 == null) {
                $batasan += 1;
            }
            if ($input_foto->gambar3 == null) {
                $batasan += 1;
            }
            $validatedData = $request->validate([
                'gambar' => 'required|array|max:' . $batasan,
                'gambar.*' => 'image|file|mimes:jpeg,png,jpg,webp|max:2048',
            ], [
                'gambar.required' => 'Harus ada gambar yang diupload minimal 1!',
                'gambar.max' => 'Gambar yang diupload maksimal ' . $batasan . '!',
                'gambar.*.image' => 'Foto gagal diunggah. Pastikan semua file yang diunggah berformat gambar(jpeg, png, jpg, webp)!',
                'gambar.*.mimes' => 'Format file tidak didukung. Harap unggah file dengan format jpeg, png, jpg, atau webp!',
                'gambar.*.max' => 'Ukuran file terlalu besar. Maksimal ukuran file adalah 2048 KB!'
            ]);
            if ($request->file('gambar')) {
                $gambar = $request->file('gambar');
                unset($validatedData['gambar']);
                for ($i = 0; $i < count($gambar); $i++) {
                    switch ($gambar[$i]->getClientMimeType()) {
                        case 'image/jpeg':
                            $ekstensi = '.jpg';
                            break;
                        case 'image/png':
                            $ekstensi = '.png';
                            break;
                        case 'image/webp':
                            $ekstensi = '.webp';
                            break;
                        default:
                            $ekstensi = '.image';
                            break;
                    }
                    if ($input_foto['gambar1'] == null && $gambar1 == false) {
                        $validatedData['gambar1'] = $gambar[$i]->storeAs('foto-odp', $input_foto->id_valins . '_1' . $ekstensi);
                        $gambar1 = true;
                    } else
                    if ($input_foto['gambar2'] == null && $gambar2 == false) {
                        $validatedData['gambar2'] = $gambar[$i]->storeAs('foto-odp', $input_foto->id_valins . '_2' . $ekstensi);
                        $gambar2 = true;
                    } else
                    if ($input_foto['gambar3'] == null && $gambar3 == false) {
                        $validatedData['gambar3'] = $gambar[$i]->storeAs('foto-odp', $input_foto->id_valins . '_3' . $ekstensi);
                        $gambar3 = true;
                    }
                }
                Valin::where('id', $input_foto->id)->update($validatedData);
            }
            return redirect('/admin/dashboard/input_foto')->with('success', 'Data dengan ID Valins -> ' . $input_foto->id_valins . ' Foto berhasil ditambah!');
        }
        // Hapus Foto
        if ($request->_method == "patch" && $request->metode == "hapus") {
            if ($input_foto['gambar' . $request->gambarKe] != null) Storage::delete($input_foto['gambar' . $request->gambarKe]);
            Valin::where('id', $input_foto->id)->update(['gambar' . $request->gambarKe => null]);
            $semuaGambarKosong = false;
            for ($i = 1; $i <= 3; $i++) {
                if ($input_foto->whereNull('gambar' . $i)->where('id_valins', $input_foto->id_valins)->get()->count() === 1) {
                    $semuaGambarKosong = true;
                } else {
                    $semuaGambarKosong = false;
                    break;
                }
            }
            if ($semuaGambarKosong === true) {
                Valin::destroy($input_foto->id);
                return redirect('/admin/dashboard/input_foto')->with('success', 'Data dengan ID Valins -> ' . $input_foto->id_valins . ' dihapus, karena tidak ada foto ODP.');
            } else {
                return redirect('/admin/dashboard/input_foto')->with('success', 'Data dengan ID Valins -> ' . $input_foto->id_valins . ', Gambar ke-' . $request->gambarKe . ' berhasil dihapus!');
            }
        }

        // Ubah Foto
        $validatedData = $request->validate([
            'gambar1' => 'image|file|mimes:jpeg,png,jpg,webp|max:2048',
            'gambar2' => 'image|file|mimes:jpeg,png,jpg,webp|max:2048',
            'gambar3' => 'image|file|mimes:jpeg,png,jpg,webp|max:2048',
            'id_witel' => 'required',
            'id_rekon' => 'required'
        ], [
            'gambar1.image' => 'Foto gagal diubah. Pastikan file yang diunggah berupa gambar!',
            'gambar1.mimes' => 'Format file tidak didukung. Harap unggah file dengan format jpeg, png, jpg, atau webp!',
            'gambar1.max' => 'Ukuran file terlalu besar. Maksimal ukuran file adalah 2 MB!',
            'id_witel.required' => 'Witel harus dipilih!',
            'id_rekon.required' => 'Rekon harus dipilih!'
        ]);
        if ($request->file('gambar' . $request->gambarKe)) {
            if ($input_foto['gambar' . $request->gambarKe] != null) Storage::delete($input_foto['gambar' . $request->gambarKe]);
            $validatedData['gambar' . $request->gambarKe] = $request->file('gambar' . $request->gambarKe)->storeAs('foto-odp', $input_foto->id_valins . '_' . $request->gambarKe . '.' . $request->file('gambar' . $request->gambarKe)->getClientOriginalExtension());
        }
        Valin::where('id', $input_foto->id)->update($validatedData);

        return redirect('/admin/dashboard/input_foto')->with('success', 'Data dengan ID Valins -> ' . $input_foto->id_valins . ' berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Valin $input_foto)
    {
        //
    }
}
