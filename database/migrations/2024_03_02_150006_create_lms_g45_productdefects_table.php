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
    Schema::create('lms_g45_productdefects', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('product_id')->nullable();
      $table->enum('name', [
        'Dimensional',
        'Surface',
        'Material',
        'Functional',
        'Assembly',
        'Aesthetic',
        'Packaging',
        'Labelling',
      ]);
      $table->text('description');
      $table->enum('status', ['open', 'resolved', 'closed'])->default('open');
      $table->enum('severity', ['low', 'medium', 'high', 'critical'])->default('medium');
      $table->string('inspector');
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
    Schema::dropIfExists('lms_g45_productdefects');
  }
};
