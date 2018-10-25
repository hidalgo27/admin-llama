<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TUsuario extends Model
{
    //
    protected $table = "tusuario";

    public function inquire()
    {
        return $this->hasMany(TInquire::class, 'idusuario');
    }

}
