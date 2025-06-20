<?php

use App\Livewire\Home\Inicio;
use App\Livewire\Sale\Salelist;
use App\Livewire\Sale\SaleShow;
use App\Livewire\User\UserShow;
use App\Livewire\Sale\SaleCreate;
use App\Livewire\Client\ClientShow;
use App\Livewire\Shop\ShopComponent;
use App\Livewire\User\UserComponent;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Product\ProductShow;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Livewire\Category\CategoryShow;
use App\Livewire\Client\ClientComponent;
use App\Livewire\Product\ProductComponent;
use App\Livewire\Category\CategoryComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//
//Route::get('/', function () {
  //  return view('welcome');
//});

Auth::routes(['register'=>false]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', Inicio::class)->name('home')->middleware(['auth']);

Route::get('/categorias', CategoryComponent::class)->name('categories')->middleware(['auth']);
Route::get('/categorias/{category}', CategoryShow::class)->name('categories.show')->middleware(['auth']);

Route::get('/productos', ProductComponent::class)->name('products')->middleware(['auth']);
Route::get('/productos/{product}', ProductShow::class)->name('products.show')->middleware(['auth']);
Route::get('/usuarios', UserComponent::class)->name('users')->middleware(['auth']);
Route::get('/usuarios/{user}', UserShow::class)->name('users.show')->middleware(['auth']);

Route::get('/clientes', ClientComponent::class)->name('clients')->middleware(['auth']);
Route::get('/clientes/{cliente}', ClientShow::class)->name('clients.show')->middleware(['auth']);

Route::get('/ventas/crear', SaleCreate::class)->name('sales.create')->middleware(['auth']);
Route::get('/sales', Salelist::class)->name('sales.list')->middleware(['auth']);
Route::get('/sales/{venta}',SaleShow::class)->name('sales.show')->middleware(['auth']);

Route::get('/tienda', ShopComponent::class)->name('shops')->middleware(['auth']);

Route::get('/sales/invoice/{venta}',[PdfController::class,'invoice'])->name('sales.invoice')->middleware(['auth']);
