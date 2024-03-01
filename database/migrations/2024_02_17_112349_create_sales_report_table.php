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
    Schema::create('sales_report', function (Blueprint $table) {
      $table->id();
      $table->date('date');
      $table->unsignedBigInteger('product_id'); // Change to unsignedBigInteger to match the product ID type
      $table
        ->foreign('product_id')
        ->references('id')
        ->on('products'); // Add foreign key constraint
      $table->integer('total_quantity');
      $table->timestamps();
    });

    Schema::table('sales_report', function (Blueprint $table) {
      $table->unique('date');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('sales_report');
  }
};
