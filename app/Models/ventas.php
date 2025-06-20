<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class,'users_id');
       

    }

    public function clientes()
    {
        return $this->belongsTo(clientes::class);
    }

    public function items()
    {
        return $this->hasMany(ventas_detalle::class);
        
    }
}
