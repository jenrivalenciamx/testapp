<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    protected $table = 'users';
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

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


    public function imagenes()
    {
        return $this->morphOne('App\Models\imagenes','imageable');
    }

    // Relaciones
    public function ventas()
    {
        return $this->hasMany(ventas::class,'users_id');
    }
}
