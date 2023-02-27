<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        
        Schema::create('photos', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->string("descripcion");
            $table->date("fecha_toma");
            $table->integer('id_usuario')->unsigned();
        
            $table->foreign('id_usuario')->references('id_usuario')->on('users')->onDelete('cascade'); 
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
