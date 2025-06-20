<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Faker\Factory as Faker;
class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Storage::deleteDirectory('public/shop');
        Storage::makeDirectory('public/shop');

        

        Shop::factory(1)->create()->each(function(Shop $shop){
            $faker = Faker::create();
            $shop->imagenes()->create(['url'=>'shop/'.$faker->image('public/storage/shop',640,480,'Shop',false)]);
        });
    }
}
