<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Producto extends Model
{
    use HasFactory;

    //nombre de la tabla
    protected $table= 'producto';

    //llave primaria
    protected $primaryKey = 'cod_producto';

    // Desactiva las marcas de tiempo
    public $timestamps = false;

    //nombre de los campos
    protected $fillable = ['nombre','descripcion','stock','cod_categoria','cod_unidadmedida'];

    //#1 En el modelo Producto, definirás una relación “muchos a uno” (one-to-many)
    //con el modelo Categoria. Esto significa que un producto pertenece a una sola categoría.
    //#2 con belongsTo Debes especificar la clave foránea que se utilizará para relacionar los
    //registros en la tabla actual (modelo actual) con los registros en la tabla relacionada (modelo relacionado).
    public function categoria(){
        return $this->belongsTo(Categoria::class,'cod_categoria');
    }

    //#1 Esto significa que un producto pertenece a una sola unidad de medida(kilo,libra,unidad).
    //definirás una relación “muchos a uno” (many-to-one) con el modelo Unidadmedida
    //#2 con belongsTo Debes especificar la clave foránea que se utilizará para relacionar los
    //registros en la tabla actual (modelo actual) con los registros en la tabla relacionada (modelo relacionado).
    public function unidadmedida(){
        return $this->belongsTo(Unidadmedida::class,'cod_unidadmedida');
    }

    //#1 definimos la relación entre la tabla entradas y producto la relación es de uno a muchos
    //#2 En el modelo Unidadmedida, definirás una relación “uno a muchos”
    //#3 (one-to-many)
    //#4 con hasMany No necesitas especificar explícitamente el ID porque sigue esta convención de nombres.
    /*public function entradas(){
        return $this->hasMany(Entrada::class,'cod_producto');
    }*/

    //relacion de muchos a muhos entre la tabla producto y proveedores
    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::class, 'producto_proveedor');
    }

    public function phone(): HasOne
    {
        return $this->hasOne(Producto::class);
    }
}
