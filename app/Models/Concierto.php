<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concierto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','provincia_id','artista_id','fechacelebracion','informacion','precio'];

    public function artistas() {
        return $this->belongsTo(Artista::class);
    }

    public function provincias() {
        return $this->belongsTo(Provincia::class);
    }

    //Relacion uno a uno polimorfica
    public function imagen(){
        return $this->morphOne(Imagen::class, 'imagenable');
    }
}
