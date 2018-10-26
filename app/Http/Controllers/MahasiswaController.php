<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mMahasiswa;

use Validator;

class MahasiswaController extends Controller
{

    public function index()
    {
      return mMahasiswa::all();

    }


    public function store(Request $request)
    { //dd($request);
        $request->validate([
          'niu'     => 'required',
          'nif'     => 'required',
          'angkatan'=> 'required',
          'nama'    => 'required',
          'prodi'   => 'required',
          'nik'   => 'required',
          'alamat'   => 'required',
          'no_rek'   => 'required',
          'nama_rek'   => 'required',
          'npwp'   => 'required',
          'no_telp'   => 'required',
        ]);

        $mahasiswa = mMahasiswa::create($request->all());

        return response()->json([
          'status'  => 'success',
          'result'  => $mahasiswa
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Mahasiswa::find($niu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mahasiswa = mMahasiswa::findOrFail($niu);
        $mahasiswa->update($request->all());

        return $mahasiswa;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $niu)
    {
        $mahasiswa = mMahasiswa::findOrFail($niu);
        $mahasiswa->delete();

        return 204;
    }
}
