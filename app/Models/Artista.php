<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','informacion'];

    public function conciertos() {
        return $this->hasMany(Concierto::class);
    }

    //Relacion uno a uno polimorfica
    public function foto(){
        return $this->morphOne(Imagen::class, 'imagenable');
    }
}
