<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mJadwal;
use App\mKelas;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Query\Builder;
use Validator;

class JadwalController extends Controller
{
  public function index()
  {
    $data=  DB::table('m_kelas')
    ->select('*')
    ->join('m_jadwals','m_jadwals.id_kls','=','m_kelas.id')
    ->join('m_sesis','m_sesis.sesi','=','m_jadwals.id_sesi')
    // ->get();
    ->orderBy('id_th', 'DESC')
    ->orderBy('hari', 'DESC')
    ->orderBy('sesi', 'ASC')
    // ->paginate(25);
    ->take(25)
    ->get();
    // dd($data);

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

}
