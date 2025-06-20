<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas_detalle extends Model
{
    use HasFactory;

    public function sales()
    {
        return $this->benlongsToMany(ventas::class);
    }
    public function productos()
    {
        return $this->belongsto(productos::class);
    }
}
