<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    //
    protected $table = 'comment';

    //
    protected $primaryKey = 'cod_comment';

    //
    protected $fillable = ['contenido','cod_post'];

    //Podemos definir la inversa de uno a muchos
    //Para definir la inversa de una hasMany relación, defina un método
    //de relación en el modelo secundario que llame al belongsTo método:
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class,'cod_comment','cod_post');
    }
}


