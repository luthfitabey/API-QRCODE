<?php
namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

use App\mMahasiswa;
use App\mDetailPertemuan;

use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
  use HasApiTokens, Notifiable;
/**
* The attributes that are mass assignable.
*
* @var array
*/
protected $fillable = [
'name', 'username', 'password',
];
/**
* The attributes that should be hidden for arrays.
*
* @var array
*/
protected $hidden = [
'password', 'remember_token',
];

public function mahasiswa()
{
    return $this->hasOne(Mahasiswa::class);
}
public function AauthAcessToken(){
    return $this->hasMany('\App\OauthAccessToken');
}
public function details()
{
    return $this->hasMany('\App\mDetailPertemuan', 'id_mhs');
}
}
