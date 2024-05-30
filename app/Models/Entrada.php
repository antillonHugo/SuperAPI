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
    protected $primaryKey = 'cod_entrada';

    //nombre de los campos
    protected $fillable = ['cod_producto','proveedor_id','cantidad','fecha_ingreso'];

    public $timestamps = false; // Desactiva las marcas de tiempo

    //definimos la relación entre la tabla producto y entrada la relación es de uno a muchos
    //#4 con hasMany No necesitas especificar explícitamente el ID porque sigue esta convención de nombres.
    public function productos(){
        return $this->hasMany(Producto::class,'cod_producto');
    }

}
