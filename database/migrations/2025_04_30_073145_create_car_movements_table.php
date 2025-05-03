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
        Schema::create('car_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Car::class)->constrained()->cascadeOnDelete();
            $table->enum('type', ['in', 'out']);
            $table->text('description')->nullable();
            $table->timestamp('moved_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_movements');
    }
};
