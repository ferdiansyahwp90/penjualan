<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beras extends Model
{
    protected $table='beras'; 
    protected $primaryKey = 'id_beras'; 
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'id_beras' ,
        'nama_beras' ,
        'hargaberas' ,
        'stock' ,
        'berat' ,
        'diskon' ,
        'keterangan' ,
    ];
}
