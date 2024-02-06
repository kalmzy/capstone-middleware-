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
    Schema::create('tasks', function (Blueprint $table) {
      $table->string('product_unit');
      $table
        ->foreign('product_unit')
        ->references('product_unit')
        ->on('newp')
        ->onUpdate('cascade')
        ->onDelete('cascade');
      $table->timestamps();
      $table->string('location_part_id');
      $table->text('description');
      $table->enum('severity_level', ['Critical', 'Major', 'Minor']);
      $table->text('root_cause_analysis')->nullable();
      $table->text('corrective_action_taken');
      $table->boolean('verification_of_correction');
      $table->enum('status', ['Open', 'Resolved', 'Closed']);
      $table->text('notes_comments')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('tasks');
  }
};
