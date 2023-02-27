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
        Schema::create('hechizo_user', function (Blueprint $table) {
            
            $table->increments('id_hechizo_user');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_hechizo')->unsigned();

            $table->foreign('id_usuario')->references('id_usuario')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_hechizo')->references('id_hechizo')->on('hechizos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hechizo_user');
    }
};
