<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->decimal('precio', 8, 2);
            $table->integer('stock');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();
            

            $table->foreign('categoria_id')->references('id')->on('categorias');
        
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
