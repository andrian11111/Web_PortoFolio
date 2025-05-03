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
        Schema::create('skil', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // The name of the skill
            $table->text('description')->nullable();  // A description of the skill
            $table->string('photo')->nullable();  // Column to store the photo (image file path)
            $table->timestamps();  // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skil');
    }
};
