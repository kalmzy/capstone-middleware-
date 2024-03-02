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
    Schema::create('sales', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('product_id')->nullable();
      $table->integer('quantity_sold');
      $table->decimal('total_sale', 10, 2);
      $table->date('sale_date');
      $table->timestamps();

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
    Schema::dropIfExists('sales');
  }
};
