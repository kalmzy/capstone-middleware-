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
    Schema::create('predicted_sales', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('month'); // Assuming 'month' is the month of the prediction
      $table->decimal('predicted_sales', 10, 2);
      $table->timestamps();

      // Add a unique constraint on the 'month' column
      $table->unique('month');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('predicted_sales');
  }
};
