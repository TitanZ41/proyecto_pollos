<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detalle_pedidos extends Model
{
    protected $table = 'detalle_pedidos';

    protected $fillable = [
        /*'inventarios_id',*/
        'cantidad',
        'subtotal',
    ];

    /*public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'inventarios_id');
    }*/
}
