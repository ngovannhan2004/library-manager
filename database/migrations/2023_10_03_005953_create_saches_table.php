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
        Schema::create('saches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dausach_id');
            $table->string('tinhtrang');
            $table->string('nguoicapnhat');
            $table->string('thanhly');
            $table->foreign('dausach_id')->references('id')->on('dausachs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saches');
    }
};
