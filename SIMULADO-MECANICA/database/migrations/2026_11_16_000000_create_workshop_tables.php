<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->integer('id_cliente')->autoIncrement()->primary();
            $table->string('nome', 100);
            $table->binary('cpf');
            $table->string('telefone', 20);
            $table->string('email', 100)->nullable();
        });

        if (DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE clientes MODIFY cpf VARBINARY(255) NOT NULL');
        }

        Schema::create('veiculos', function (Blueprint $table) {
            $table->integer('id_veiculo')->autoIncrement()->primary();
            $table->string('placa', 10)->unique();
            $table->string('marca', 50);
            $table->string('modelo', 50);
            $table->integer('ano');
            $table->integer('id_cliente');
            $table->foreign('id_cliente')
                ->references('id_cliente')
                ->on('clientes')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::create('agendamentos', function (Blueprint $table) {
            $table->integer('id_agendamento')->autoIncrement()->primary();
            $table->dateTime('data_agendamento')->index();
            $table->string('descricao_servico', 255);
            $table->string('status', 30)->default('Agendado');
            $table->integer('id_cliente');
            $table->integer('id_veiculo');
            $table->foreign('id_cliente')
                ->references('id_cliente')
                ->on('clientes')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('id_veiculo')
                ->references('id_veiculo')
                ->on('veiculos')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
        Schema::dropIfExists('veiculos');
        Schema::dropIfExists('clientes');
    }
};
