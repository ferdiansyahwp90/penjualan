<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    protected $table='detail'; 
    protected $primaryKey = 'id_detail'; 
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'id_detail' ,
        'id_penjualan' ,
        'jumlah' ,
        'hargaberas' ,
        'diskon' ,
    ];
}
