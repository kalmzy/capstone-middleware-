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
    Schema::create('lms_g45_monthlypredictedsales', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('product_id')->nullable();
      $table->unsignedBigInteger('month'); // Assuming 'month' is the month of the prediction
      $table->decimal('predicted_sales', 10, 2);
      $table->timestamps();

      // Add a unique constraint on the 'month' column
      $table->unique('month');

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
    Schema::dropIfExists('lms_g45_monthlypredictedsales');
  }
};
