<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\mDetailPertemuan;
use App\mMahasiswa;
use App\mStatus;
use Illuminate\Database\Eloquent\Model;

class mDetailPertemuan extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['id_mhs', 'id_status', 'id_pertemuan', 'rating', 'komentar', 'imei'];

    public function mMahasiswa()
    {
        return $this->belongsTo(mMahasiswa::class);
    }
    public function status()
    {
        return $this->belongsTo('App\mStatus', 'id_status', 'id');
    }
    public function history()
    {
        return $this->belongsTo(User::class);
    }
}
