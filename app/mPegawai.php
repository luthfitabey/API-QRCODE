<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;

class mPegawai extends Authenticatable
{
    use Notifiable;
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
