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
            $table->id();
            $table->string('unit');
            $table->integer('jan');
            $table->integer('feb');
            $table->integer('mar');
            $table->integer('april');
            $table->integer('may');
            $table->integer('june');
            $table->integer('july');
            $table->integer('aug');
            $table->integer('sept');
            $table->integer('nov');
            $table->integer('oct');
            $table->integer('dec');
            $table->integer('totalsale');
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
