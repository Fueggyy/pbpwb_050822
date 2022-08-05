<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::get();

        return view('siswa.index', [
            "siswa" => $siswa,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nis' => 'required|string',
            'nama' => 'required|string',
            'tahunmasuk' => 'required|string',
            'idangkatan' => 'required|string',
            'idkelas' => 'required|string',
        ]);

        Siswa::create($validatedData);

        return to_route('siswa')->with('success', 'tambah data berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($nis)
    {
        $getSiswa = Siswa::all();

        $siswa = Siswa::where('nis', $nis)->first();
        if (!$siswa) {
            return to_route('siswa')->with('error', 'data tidak ditemukan');
        }
        return view('siswa.show', [
            "siswa" => $siswa,
            "getSiswa" => $getSiswa,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nis' => 'required|string',
            'nama' => 'required|string',
            'kelamin' => 'required|string',
        ]);

        $siswa = Siswa::where('nis', $request->nis);
        if (!$siswa) {
            return to_route('siswa')->with('error', 'data tidak ditemukan');
        }
        $siswa->update($validatedData);

        return to_route('siswa')->with('success', 'edit data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($nis)
    {
        $siswa = Siswa::where('nis', $nis);
        $siswa->delete();

        return to_route('siswa');
    }
}
