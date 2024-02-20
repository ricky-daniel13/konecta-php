<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'referencia', 'precio', 'peso', 'stock', 'idCategoria'];
    public function categoria(): BelongsTo
    {
        return $this->BelongsTo(Categoria::class, 'idCategoria');
    }
    public $timestamps = false;
}
