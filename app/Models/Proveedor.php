<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    // Especifica el nombre personalizado de la clave primaria
    protected $primaryKey = 'proveedor_id';

    // Especifica el nombre de la tabla si no sigue la convención de nombres de Laravel
    protected $table = 'proveedor';

    //definismo los campos que seran alterados
    // Especifica los campos que pueden ser asignados masivamente
    protected $fillable = ['proveedor_nombre','proveedor_telefono','proveedor_direccion'];
}
