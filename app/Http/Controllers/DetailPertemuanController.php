<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\mDetailPertemuan;
use App\mMahasiswa;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\mStatus;
use Validator;
use Illuminate\Support\Facades\DB;
class DetailPertemuanController extends Controller
{
  protected $mahasiswa;
  public function index()
  {
    // return mSementara::all();
    $data = \App\mDetailPertemuan::all();
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
  public function cekPresensi()
  {
    $user = Auth::user()->id;
    // dd($user);
    $data_exist=  DB::table('m_detail_pertemuans')
    ->where('id_mhs', $user)
    ->where('rating', '=' , NULL)
    ->exists();
      // dd($data_exist);
      if($data_exist == true ) {

          $data=  DB::table('m_detail_pertemuans')
          ->select('id')
          ->where('id_mhs', $user)
          ->where('rating', '=' , NULL)
          ->get();

        return response()->json([
          // 'status'  => 'success',
          'result'  => $data
          // $data
        ]);

      }
      else {
        return response()->json([
        'message' => 'dah bener'], 422);
      }
  }


  public function store(Request $request)
  {
      $request->validate([
        'rating'     => 'nullable|numeric',
        'komentar'    => 'nullable|string',
        'imei'   => 'required',
        'id_pertemuan'=> 'required',
      ]);
      $data_exist = DB::table('m_detail_pertemuans')
                  ->where('id_pertemuan', $request->id_pertemuan)
                  ->where ('imei', $request->imei)
                  ->exists();
      // dd($data_exist);
      if($data_exist == true ) {
                      return response()->json([
                      'message' => 'imei dobel bos.'], 422);
      }
      else {
            $sementara = $request->all();
            $sementara['id_mhs'] = $request->user()->id;
            mDetailPertemuan::create($sementara);
            return response()->json([
              'status'  => 'success',
              'result'  => $sementara
            ]);
      }
    }

    public function update(Request $request, $id)
    {

        // $detail = \App\mDetailPertemuan::find($id);

                $rating = $request->input('rating');
                $komentar = $request->input('komentar');

                $data = \App\mDetailPertemuan::where('id',$id)->first();
                $data->rating = $rating;
                $data->komentar = $komentar;


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
    public function detail($id)
    {
      $data2=  DB::table('m_detail_pertemuans')
      ->select('*')
      ->where('id', $id)
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
}
