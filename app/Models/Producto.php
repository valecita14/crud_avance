<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }
}
