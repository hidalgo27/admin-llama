<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TInquire extends Model
{
    //
    protected $table = "tinquires";

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idusuario');
    }
}
