<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mGedung;
use App\mRuang;
use Validator;

class GedungController extends Controller
{
  public function index()
  {
    // return mSementara::all();
    $data = \App\mGedung::all();
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

      $sementara = mGedung::create($request->all());

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
  public function show(mSementara $sementara)
  {
      // return new sementara($sementara);
    $data = \App\mGedung::where('id',$id)->get();

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
  public function update(Request $request, $ruang)
  {
            $ruang = $request->input('ruang');
            // $komentar = $request->input('komentar');

            $data = \App\mRuang::where('ruang',$ruang)->first();
            $data->ruang = $ruang;
            // $data->komentar = $komentar;


            if($data->save()){
              return response()->json([
                      'message' => 'Post has been updated',
                      'result'  => $data
                  ]);
            }
            else{
              return response()->json([
                  'message' => 'Post not found',
              ], 404);
            }
      
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete(Request $request, $niu)
  {
      $sementara = mGedung::findOrFail($niu);
      $sementara->delete();

      return 204;
  }
}
