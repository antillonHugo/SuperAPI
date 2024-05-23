<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    //nombre de la tabla
    protected $table = 'entrada';

    //llave primaria
    protected $primarykey = 'cod_entrada';

    //nombre de los campos
    protected $fillable = ['cod_producto','cantidad','fecha_ingreso'];

    //definimos la relación entre la tabla producto y entrada la relación es de uno a muchos
    public function productoss(){
        return $this->hasMany(Producto::class);
    }

}
