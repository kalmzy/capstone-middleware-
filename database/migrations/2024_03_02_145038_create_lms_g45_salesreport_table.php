<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('lms_g45_salesreport', function (Blueprint $table) {
      $table->id();
      $table->date('date')->nullable();
      $table->unsignedBigInteger('product_id')->nullable();
      $table->integer('total_quantity')->nullable();
      $table->timestamps();

      $table->unique('date');
      $table->index('product_id');

      $table
        ->foreign('product_id')
        ->references('id')
        ->on('lms_g41_products')
        ->onDelete('restrict')
        ->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('lms_g45_salesreport');
  }
};
