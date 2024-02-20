<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = ['cantidad', 'idProducto'];
    public function producto(): BelongsTo
    {
        return $this->BelongsTo(Categoria::class, 'idVenta');
    }
    public $timestamps = false;
}
