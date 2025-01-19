<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->bigInteger('call')->default(0);
            $table->string('login', 40);
            $table->string('password', 60);
            $table->boolean('active', 1)->default(1);
            $table->boolean('leader', 1)->default(0);
            $table->timestamps();
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};