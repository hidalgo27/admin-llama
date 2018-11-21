<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TPayment extends Model
{
    //
    protected $table = "tpayment";

    public function inquires()
    {
        return $this->belongsTo(TInquire::class, 'idinquires');
    }
}
