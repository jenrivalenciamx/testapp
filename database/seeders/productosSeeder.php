<?php

namespace Database\Seeders;

use App\Models\productos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class productosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        productos::factory(20)->create()->each(function(productos $product){
            $faker = Faker::create();
            $product->imagenes()->create(['url'=>'productos/'.$faker->imagenes('public/storage/productos',640,480,'Producto',false)]);
            //$product->imagenes()->create(['url'=>'productos/'.$faker->imagenes('public/storage/productos')]);
            
           // $customName='productos/'.uniqid().'.'.$this->imagen->extension();

           // $product->imagenes()->create(['url'=>$customName]);
        });
    }
}