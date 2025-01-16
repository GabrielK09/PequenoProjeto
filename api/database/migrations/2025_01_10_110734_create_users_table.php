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
            $table->string('name');
            $table->string('call')->nullable()->default(0);
            $table->string('login');
            $table->string('password');
            $table->boolean('active', 1)->default(1);
            $table->timestamps();
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
