<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    use HasFactory;
    protected $fillable =[
        'nombre','identificacion','telefono','email','empresa','nit'
    ];


      // Relaciones
      public function sales()
      {
          return $this->hasMany(ventas::class);
      }
  
}
