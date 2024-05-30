<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'contactos';

    protected $primaryKey= 'cod_contacto';

    protected $fillable = ['telefono','cod_usuario'];

    //relacion de uno a uno con la tabla usuario y contacto
    //Podemos definir la inversa de una hasOne relación usando el belongsTo método:
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class,'cod_contacto','cod_usuario');
    }
}
