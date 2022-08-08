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

        return to_route('pegawai')->with('success', 'tambah data berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai, $nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->first();
        
        if (!$pegawai) {
            return to_route('pegawai')->with('error', 'data tidak ditemukan');
        }
        return view('pegawai.show', [
            "pegawai" => $pegawai,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|string',
            'nama' => 'required|string',
            'gelarakhir' => 'required|string',
        ]);

        $pegawai = Pegawai::where('nip', $request->nip);
        if (!$pegawai) {
            return to_route('pegawai')->with('error', 'data tidak ditemukan');
        }
        $pegawai->update($validatedData);

        return to_route('pegawai')->with('success', 'edit data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($nip)
    {
        $pegawai = Pegawai::where('nip', $nip);
        $pegawai->delete();

        return to_route('pegawai');
    }
}
