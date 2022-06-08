<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table='pembayaran'; 
    protected $primaryKey = 'id_pembayaran'; 
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'id_pembayaran' ,
        'id_penjualan' ,
        'totaltrf',
        'tanggal' ,
    ];
}
