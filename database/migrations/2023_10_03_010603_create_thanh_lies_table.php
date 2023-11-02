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
        Schema::create('thanh_lies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sach_id');
            $table->string('lydo');
            $table->string('nguoitl');
            $table->string('ngaytl');
            $table->foreign('sach_id')->references('id')->on('saches')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanh_lies');
    }
};
