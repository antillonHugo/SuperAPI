<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidadmedida extends Model
{
    use HasFactory;

    //llava primaria
    protected $primaryKey = 'cod_unidadmedida';

    //nombre de la tabla
    protected $table = 'unidadesmedida';

    //campos de la tabla
    protected $fillable = ['unidad_medida'];

    public $timestamps = false; // Desactiva las marcas de tiempo

    //definimos la relacion uno a muchos con la tabla producto
    //#1 En el modelo Unidadmedida, definirás una relación “uno a muchos”
    //#2(one-to-many) con el modelo Producto. Esto significa que una unidad de medida puede tener varios productos asociados.
    //#3 con hasMany No necesitas especificar explícitamente el ID porque sigue esta convención de nombres.
    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
