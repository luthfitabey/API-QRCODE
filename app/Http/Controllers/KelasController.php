<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mKelas;
use Validator;

class KelasController extends Controller
{
  public function index()
  {
    // return mSementara::all();
    $data = \App\mKelas::all();
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

      $sementara = mKelas::create($request->all());

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
  public function show(mKelas $sementara)
  {
      // return new sementara($sementara);
    $data = \App\mKelas::where('id',$id)->get();

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
      $sementara = mKelas::findOrFail($niu);
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
      $sementara = mKelas::findOrFail($niu);
      $sementara->delete();

      return 204;
  }
}
