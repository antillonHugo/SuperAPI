<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidadmedida extends Model
{
    use HasFactory;

    //llava primaria
    protected $primarykey = 'cod_unidadmedida';

    //nombre de la tabla
    protected $table = 'unidadesmedida';

    //campos de la tabla
    protected $fillable = ['unidad_medida'];

    public $timestamps = false; // Desactiva las marcas de tiempo

    //definimos la relacion uno a muchos con la tabla producto
    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
