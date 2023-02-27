<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero'
    ];

    public function user(){
        
        $this->belongsTo(User::class,'id_usuario','id_usuario');
    }
}
