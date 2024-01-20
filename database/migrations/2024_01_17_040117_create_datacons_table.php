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
        Schema::create('datacons', function (Blueprint $table) {
            
            $table->string('product_unit');
            $table->foreign('product_unit')->references('product_unit')->on('product')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('sale');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datacons');
    }
};
