<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Usuario extends Model
{
    use HasFactory;


    protected $table = 'usuario';

    protected $primaryKey= 'cod_usuario';

    protected $fillable = ['nombre','correo'];

    //relacion de uno a uno con la tabla usuario y contacto mediante hasOne
    public function phone(): HasOne
    {
        return $this->hasOne(Contacto::class,'cod_contacto','cod_usuario');
    }
}
