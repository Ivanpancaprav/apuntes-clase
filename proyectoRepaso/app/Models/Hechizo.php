<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hechizo extends Model
{
    protected $table ='hechizos';
    protected $primaryKey ='id_hechizo';
    protected $fillable=['nombre','coste_mana','danyo'];
    public $timestamps = false;
    use HasFactory;
    
    public function user(){

        $this->belongsToMany(User::class,'hechizo_user','id_usuario','id_hechizo');
    
    }
}
