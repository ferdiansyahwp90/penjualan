<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table='penjualan'; 
    protected $primaryKey = 'id_penjualan'; 
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'id_penjualan' ,
        'id_keranjang' ,
        'tglpenjualan',
        'totalongkir' ,
        'totalharga',
    ];
}
