<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table='Pelanggan'; 
    protected $primaryKey = 'id_pelanggan'; 
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id' ,
        'beras_id' ,
        'date_order',
        'total',
    ];

    public function beras(){
        return $this->belongsTo(Beras::class, 'id_beras', 'id');
    }
}
