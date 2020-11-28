<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
