<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    protected $primaryKey = 'cod_post';

    protected $fillable = ['titulo'];

    // hasMany se utiliza para establecer una relación de uno a muchos entre dos modelos
    // Estás definiendo que un registro en la tabla Post puede tener muchos comentarios(comment) relacionados en la tabla Comment.
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class,'cod_post');
    }
}
