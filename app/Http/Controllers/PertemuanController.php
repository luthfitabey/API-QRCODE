<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mPertemuan;
use Validator;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PertemuanController extends Controller
{
  public function index()
  {
      $user = Auth::user()->id;
        $data=  DB::table('m_mahasiswa_kelas')
        ->select('*')
        ->join('m_kelas','m_kelas.id','=','m_mahasiswa_kelas.id_kls')
        ->where('id_mhs', $user)
        ->get();


        // $data->id_kls;
        // dd($data);

    // // return mSementara::all();
    // $data = \App\mPertemuan::all();
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

  public function delete(Request $request, $id)
  {
      $sementara = mPertemuan::findOrFail($id);
      $sementara->delete();

      return 204;
  }

  public function show($id)
  {
      $data = \App\mPertemuan::where('id',$id)->get();
      // dd($data);
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
  public function pertemuanId($id)
  {
    $data2=  DB::table('m_pertemuans')
    ->select('*')
    ->join('m_jadwals','m_jadwals.id_jadwal','=','m_pertemuans.id_jdwl')
    ->where('id_kls', $id)
    ->take(24)
    ->get();
      // dd($data);
    if(count($data2) > 0){ //mengecek apakah data kosong atau tidak
        $res['message'] = "Success!";
        $res['values'] = $data2;
        return response($res);
    }
    else{
        $res['message'] = "Failed!";
        return response($res);
    }
  }
    public function ShowUpdatePertemuan($id)
    {
      // $user = mPertemuan::find($id);
      $data2=  DB::table('m_pertemuans')
      ->select('*')
      ->join('m_pegawais','m_pegawais.id','=','m_pertemuans.id_pegawai')
      ->where('m_pertemuans.id', $id)
      ->take(24)
      ->get();
        // dd($data2);
      if(count($data2) > 0){ //mengecek apakah data kosong atau tidak
          $res['message'] = "Success!";
          $res['values'] = $data2;
          return response($res);
      }
      else{
          $res['message'] = "Failed!";
          return response($res);
      }
    }

}
