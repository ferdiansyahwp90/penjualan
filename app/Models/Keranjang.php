<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table='keranjang'; 
    protected $primaryKey = 'id_keranjang'; 
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'id_keranjang' ,
        'id_beras' ,
        'totalharga',
        'jumlah' ,
    ];
}
