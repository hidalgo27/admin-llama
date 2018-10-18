<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TItinerario extends Model
{
    protected $table = "titinerario";

    public function paquetes()
    {
        return $this->belongsTo(TPaquete::class, 'idpaquetes');
    }

    public function itinerario_imagen()
    {
        return $this->hasMany(TItinerarioImagen::class, 'iditinerario');
    }
}
