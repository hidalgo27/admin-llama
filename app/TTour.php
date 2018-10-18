<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TTour extends Model
{
    protected $table = "ttours";

    public function tours_destinos()
    {
        return $this->hasMany(TTourDestino::class, 'idtours');
    }
}
