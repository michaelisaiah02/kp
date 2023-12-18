<?php

namespace App\Http\Controllers;

use App\Models\Rekon;
use App\Models\User;
use App\Models\Valin;
use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class GoogleSheetAPIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard.rekon.index', [
            "title" => 'Rekon',
            "rekons" => Rekon::all()
        ]);
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
    public function show(Rekon $rekon)
    {
        $data = Sheets::spreadsheet('1Zb77WIumXAhmLgkLqZ3oeSzhVDQLuOhrR513fDOirj4')->sheet(strtoupper($rekon->bulan))->get();
        $headers = $data->pull(0);
        array_splice($headers, 5, 1);
        array_splice($headers, 6, 2);
        foreach ($data as $value) {
            array_splice($value, 5, 1);
            array_splice($value, 6, 2);
            $dat[] = $value;
        }
        // dd($headers, $dat);
        $valins = Sheets::collection(header: $headers, rows: $dat);
        $valins = array_values($valins->toArray());
        return view('admin.dashboard.rekon.show', [
            "title" => 'Detail Rekon',
            "rekon" => $rekon->bulan,
            "headers" => $headers,
            "valins" => $valins,
            "users" => User::all()
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
