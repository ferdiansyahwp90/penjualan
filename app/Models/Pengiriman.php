<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table='pengiriman'; 
    protected $primaryKey = 'id_pengiriman'; 
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'id_pengiriman' ,
        'id_pembayaran' ,
        'totaongkir',
        'alamat' ,
        'kurir',
    ];
}
