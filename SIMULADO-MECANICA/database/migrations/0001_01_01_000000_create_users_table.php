<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->integer('id_usuario')->autoIncrement()->primary();
            $table->string('nome', 100);
            $table->string('email', 100)->unique();
            $table->string('senha', 255);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
