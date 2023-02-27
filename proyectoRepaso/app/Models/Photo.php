<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table ='photos';
    protected $primaryKey ='id';
    protected $fillable=['descripcion','fecha_toma'];
    
    use HasFactory;


    public function user(){
        return $this->belongsTo('App\Models\User','id_usuario','id_usuario');
    }
}
