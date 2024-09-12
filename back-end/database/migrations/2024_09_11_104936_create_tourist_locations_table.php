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
        Schema::create('tourist_locations', function (Blueprint $table) {
            $table->id();  // Primary Key with Auto Increment
            $table->string('name', 100);
            $table->text('description');
            $table->string('address', 200);
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('type', 50);
            $table->string('image', 255);
            $table->decimal('user_ratings', 3, 2);
            $table->integer('number_of_visitors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourist_locations');
    }
};
