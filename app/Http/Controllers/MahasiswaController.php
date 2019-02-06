<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mMahasiswa;
use App\User;
use Validator;
use Illuminate\Support\Facades\DB;
class MahasiswaController extends Controller
{
  protected $user;
  public function index()
  {
    // return mSementara::all();
    $data = \App\mMahasiswa::all();
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
        'nif'    => 'required',
        'angkatan'   => 'required',
        'prodi'=> 'required',
        'nik'=> 'required',
        'alamat'=> 'required',
        'no_rek'    => 'required',
        'nama_rek'    => 'required',
        'npwp'    => 'required',
        'no_telp'    => 'required',
      ]);
      // $deal->matches()->create(['user_id'=>$id]);
      // $sementara = mMahasiswa::create($request->all());
      $sementara = $request->all();
      $sementara['nama'] = $request->user()->name;
      $sementara['niu'] = $request->user()->username;
      $sementara['user_id'] = $request->user()->id;
      mMahasiswa::create($sementara);
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
  // public function show(mMahasiswa $mahasiswa)
  // {
  //     // return new sementara($sementara);
  //   $data = $this->user->mahasiswa()->find($id);
  //
  //   if(count($data) > 0){ //mengecek apakah data kosong atau tidak
  //       $res['message'] = "Success!";
  //       $res['values'] = $data;
  //       return response($res);
  //   }
  //   else{
  //       $res['message'] = "Failed!";
  //       return response($res);
  //   }
  // }

  

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete(Request $request, $niu)
  {
      $sementara = mMahasiswa::findOrFail($niu);
      $sementara->delete();

      return 204;
  }

}
