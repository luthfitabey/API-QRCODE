<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\mDetailPertemuan;
use App\User;

class mMahasiswa extends Authenticatable
{
  use Notifiable;
  protected $fillable = ['user_id', 'niu', 'nif', 'angkatan', 'nama', 'prodi', 'nik', 'alamat', 'no_rek', 'nama_rek', 'npwp', 'no_telp'];

  public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
  public function detail()
  {
       return $this->hasMany('App\mDetailPertemuan', 'id_mhs', 'id');
   }
}
