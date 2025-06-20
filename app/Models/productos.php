<?php

namespace App\Models;

use App\Models\ventas;
use App\Models\ventas_detalle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class productos extends Model
{
    use HasFactory;

    public function imagenes()
    {
        return $this->morphOne('App\Models\imagenes','imageable');
    }

  
     public function sales()
     {
         return $this->hasMany(ventas_detalle::class);
     }
 


    public function categorias()
    {
        return $this->belongsTo(categorias::class);
    }

    //Atributos
    protected function stockLabel() : Attribute{
        return Attribute::make(
            get: function(){
                return $this->attributes['stock'] >= $this->attributes['stock_minimo'] ? '<span class="badge badge-pill badge-success">'
                .$this->attributes['stock'].'</span>' : '<span class="badge badge-pill badge-danger">'.$this->attributes['stock'].'</span>';
            }
        );
         
    }

    protected function precio() : Attribute{
        return Attribute::make(
            get: function(){
                return '<b>$'.number_format($this->attributes['precio_venta'],0,'.',',').'</b>';
            }
        );
         
    }


    protected function activoLabel() : Attribute{
        return Attribute::make(
            get: function(){
                return $this->attributes['activo'] ? '<span class="badge badge-success">Activo
                </span>' : '<span class="badge badge-warning">Inactivo</span>';
            }
        );
         
    }


    
    protected function imagen() : Attribute{
        return Attribute::make(
            get: function(){
                return $this->imagenes ? url('storage/'.$this->imagenes->url): asset('no-image.png');
            }
        );
         
    }
}


