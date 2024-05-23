<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    //nombre de la tabla
    protected $table= 'producto';

    //llave primaria
    protected $primarykey = 'cod_producto';

    // Desactiva las marcas de tiempo
    public $timestamps = false;

    //nombre de los campos
    protected $fillable = ['nombre','descripcion','stock','cod_categoria','cod_unidadmedida'];

    //definimos la relación de uno a muchos con la tabla producto
    public function categoria(){
        return $this->belongsTo(Categoria::class,'cod_categoria');
    }

    //definismo la relación uno a muchos con la tabla unidades de medida
    public function unidadmedida(){
        return $this->belongsTo(Unidadmedida::class,'cod_unidadmedida');
    }

    //definimos la relación entre la tabla entradas y producto la relación es de uno a muchos
    public function entradas(){
        return $this->hasMany(Entrada::class);
    }
}
