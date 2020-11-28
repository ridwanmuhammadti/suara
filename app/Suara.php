<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suara extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama','no_ktp','no_tps','alamat','kelurahan','rt','rw','ket','tgl_terima','no_telpon','tim_pendata','koordinator'];
    protected $dates = ['created_at', 'updated_at', 'tgl_terima'];
}
