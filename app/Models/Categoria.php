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
    protected $id = 'cod_categoria';

    //nombre de los campos
    protected $fillable = ['nombre_categoria'];

    public $timestamps = false; // Desactiva las marcas de tiempo

    //definimos la relación de uno a muchos con la tabla producto
    public function productosss(){
        return $this->hasMany(Producto::class);
    }
}
