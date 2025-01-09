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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->boolean('type', 1);
            $table->string('cpf', 11)->nullable();
            $table->string('cnpj', 14)->nullable();

            $table->string('uf', 2);
            $table->string('municipality', 2);
            $table->integer('country_code', 8);
            $table->string('country', 8);
            $table->integer('cep', 8);

            $table->string('address', 200);
            $table->string('public_place', 200);
            $table->integer('number', 90);
            $table->string('complement', 200)->nullable();            
            $table->string('neighborhood', 100);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
