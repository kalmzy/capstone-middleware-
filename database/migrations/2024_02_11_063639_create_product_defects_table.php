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
    Schema::create('product_defects', function (Blueprint $table) {
      $table->id();
      $table->foreignId('product_id')->constrained();
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
      $table->string('assigned_to');
      $table->string('reported_by');
      //$table->unsignedBigInteger('assigned_to')->nullable();
      //$table->unsignedBigInteger('reported_by')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('product_defects');
  }
};
