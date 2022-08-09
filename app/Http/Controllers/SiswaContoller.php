<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

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
        $validatedData = $request->validate([
            'nis' => 'required|string',
            'nama' => 'required|string',
            'kelamin' => 'required|string'
        ]);

        Siswa::create($validatedData);

        return to_route('dashboard.siswa.index')->with('success', 'tambah data berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($nis)
    {
        $siswa = Siswa::where('nis', $nis)->first();
        return view('siswa.show', [
            "siswa" => $siswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nis)
    {
        $validatedData = $request->validate([
            'nis' => 'required|string',
            'nama' => 'required|string',
            'kelamin' => 'required|string',
        ]);
        Siswa::where('nis', $nis)->update($validatedData);
        return to_route('dashboard.siswa.index')->with('success', 'update data berhasil');
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
        if (!$siswa) {
            return to_route('dashboard.index')->with('error', 'data tidak ditemukan');
        }
        $siswa->delete();
        return to_route('dashboard.index')->with('success', 'hapus data berhasil');
    }
}
