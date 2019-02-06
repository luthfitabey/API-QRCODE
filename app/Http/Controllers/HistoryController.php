<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mMahasiswa;
use App\User;
use App\mDetailPertemuan;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
  public function details()
  {
      $user = Auth::user();
      dd($user);
      // $history = \App\mDetailPertemuan::with(['user'])->first();
      // $history->user->id_mhs;
      return response()->json(['success' => $profil], $this-> successStatus);
  }
}
