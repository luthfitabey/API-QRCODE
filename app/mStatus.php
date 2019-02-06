<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\mDetailPertemuan;
class mStatus extends Model
{
    protected $guarded = [''];
    public function detail()
    {
        return $this->hasOne('App\mDetailPertemuan');
    }

}
