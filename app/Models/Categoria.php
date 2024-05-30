<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //nombre de la tabla
    protected $table = 'categoria';

    //llave primaria
    protected $primaryKey = 'cod_categoria';

    //nombre de los campos
    protected $fillable = ['nombre_categoria'];

    public $timestamps = false; // Desactiva las marcas de tiempo

    //definimos la relación de uno a muchos con la tabla producto
    //En el modelo Categoria, definirás una relación “uno a muchos” (many-to-one)
    //con el modelo Producto. Esto significa que una categoría puede tener varios productos asociados.
    //OJO No necesitas especificar explícitamente la clave foránea en este caso
    public function productos(){
        return $this->hasMany(Producto::class);
    }
}
