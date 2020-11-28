<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFoto(){
        if(!$this->gambar){
           return asset('images/default.png');
        }
        return asset('images/'.$this->gambar);
     }

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
    public function gaji(){
        return $this->hasMany(Transaksi::class);
    }

    public function customer(){
        return $this->hasMany(Transaksi::class);
    }
}
