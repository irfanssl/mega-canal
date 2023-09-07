<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;;

class Pesanan extends Model
{
    protected $table = 't_pesanan'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_penana',
        'tanggal',
        'nm_supplier',
        'nm_produk',
        'total',
        'created_by'
    ];
}
