<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mMahasiswaKelas;
use Validator;

class MahasiswaKelasController extends Controller
{
  public function index()
  {
    // return mSementara::all();
    $data = \App\mMahasiswaKelas::all();
      if(count($data) > 0){ //mengecek apakah data kosong atau tidak
       $res['message'] = "Success!";
       $res['values'] = $data;
       return response($res);
     }
     else{
         $res['message'] = "Empty!";
         return response($res);
     }
  }


  public function store(Request $request)
  { //dd($request);
      $request->validate([
        'semester'     => 'required',
        'matkul'    => 'required',
        'ruang'   => 'required',
        'dosen'=> 'required',
        'niu'    => 'required'
      ]);

      $sementara = mMahasiswaKelas::create($request->all());

      return response()->json([
        'status'  => 'success',
        'result'  => $sementara
      ]);

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(mMahasiswaKelas $sementara)
  {
      // return new sementara($sementara);
    $data = \App\mMahasiswaKelas::where('id',$id)->get();

    if(count($data) > 0){ //mengecek apakah data kosong atau tidak
        $res['message'] = "Success!";
        $res['values'] = $data;
        return response($res);
    }
    else{
        $res['message'] = "Failed!";
        return response($res);
    }
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
      $sementara = mMahasiswaKelas::findOrFail($niu);
      $sementara->update($request->all());

      return $sementara;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete(Request $request, $niu)
  {
      $sementara = mMahasiswaKelas::findOrFail($niu);
      $sementara->delete();

      return 204;
  }
}
