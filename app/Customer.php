<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
