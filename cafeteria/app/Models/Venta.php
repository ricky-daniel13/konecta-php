<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = ['cantidad', 'idProducto', 'precioHist'];
    public function producto(): BelongsTo
    {
        return $this->BelongsTo(Producto::class, 'idProducto');
    }
    public $timestamps = false;

    protected $appends = array('total');

    public function getTotalAttribute()
    {
        return $this->precioHist*$this->cantidad;  
    }
}
