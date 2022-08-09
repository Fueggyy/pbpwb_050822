<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::get();
        return view('pegawai.index', [
            "pegawai" => $pegawai,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|string',
            'nama' => 'required|string',
            'gelarakhir' => 'required|string',
        ]);
        Pegawai::create($validatedData);

        return to_route('dashboard.index')->with('success', 'tambah data berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->first();
        if (!$pegawai) {
            return to_route('dashboard.index')->with('error', 'data tidak ditemukan');
        }
        return view('pegawai.show', [
            "pegawai" => $pegawai,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nip)
    {
        $validatedData = $request->validate([
            'nip' => 'required|string',
            'nama' => 'required|string',
            'gelarakhir' => 'required|string',
        ]);
        Pegawai::where('nip', $nip)->update($validatedData);
        return to_route('dashboard.index')->with('success', 'update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nip)
    {
        $pegawai = Pegawai::where('nip', $nip);

        if (!$pegawai) {
            return to_route('dashboard.index')->with('error', 'data tidak ditemukan');
        }

        $pegawai->delete();

        return to_route('dashboard.index')->with('success', 'hapus data berhasil');
    }
}
