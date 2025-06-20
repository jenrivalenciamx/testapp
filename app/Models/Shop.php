<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;



class Shop extends Model
{
    use HasFactory;


    public function imagenes()
    {
        return $this->morphOne('App\Models\imagenes','imageable');
    }


    protected function imagen() : Attribute{
        return Attribute::make(
            get: function(){
                return $this->imagenes ? url('storage/'.$this->imagenes->url): asset('no-image.png');
            }
        );
         
    }


}
