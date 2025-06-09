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
       Schema::create('ratings', function (Blueprint $table) {
    $table->id();
  $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
    $table->foreignId('school_id')->constrained()->onDelete('cascade');
     $table->decimal('overall_rating', 3, 1); 
    $table->integer('teaching_quality')->unsigned()->between(1, 5);
    $table->integer('facilities')->unsigned()->between(1, 5);
    $table->integer('administration')->unsigned()->between(1, 5);
    $table->integer('safety')->unsigned()->between(1, 5);
    $table->text('comment')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
