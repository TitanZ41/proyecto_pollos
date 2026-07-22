<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inventarios extends Model
{
    protected $table = 'inventarios';

    protected $fillable = [
        'producto',
        'stock_actual',
        'stock_minimo',
        'precio',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
    ];
}
