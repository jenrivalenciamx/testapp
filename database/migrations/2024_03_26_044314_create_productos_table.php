<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->decimal('precio_compra',10,2)->nullable();
            $table->decimal('precio_venta',10,2);
            $table->float('stock',10,2);
            $table->float('stock_minimo',10,2)->nullable();
            $table->string('codigo_barras')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->boolean('activo')->default(true);
            $table->foreignId('categorias_id')->constrained;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
