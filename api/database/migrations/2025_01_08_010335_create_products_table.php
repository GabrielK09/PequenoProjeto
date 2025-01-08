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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product', 100);
            $table->string('description', 200);
            $table->float('qtde', 15, 4);
            $table->float('sale_price', 10, 2);
            $table->string('image', 100);
            $table->string('cfop', 4);
            $table->string('csosn', 3);
            $table->string('ncm', 50);
            $table->float('icms', 40);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
