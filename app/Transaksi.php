<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status_payment'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function harga(){
        return $this->belongsTo(Harga::class);
    }
}
