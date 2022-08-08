<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaContoller extends Controller
{
    public function index()
    {
        $siswa = Siswa::get();

        return view('siswa.index', [
            "siswa" => $siswa,
        ]);
    }

    public function create()
    {
        return view('siswa.tambah');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nis' => 'required|string',
            'nama' => 'required|string',
            'kelamin' => 'required|string'
        ]);

        Siswa::create($validatedData);

        return to_route('siswa')->with('success', 'tambah data berhasil');
    }

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

    public function destroy($nis)
    {
        $siswa = Siswa::where('nis', $nis);
        $siswa->delete();

        return to_route('siswa');
    }
}
