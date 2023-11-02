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
        Schema::create('dau_saches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tacgia');
            $table->string('nhaxuatban');
            $table->unsignedBigInteger('theloai_id');
            $table->unsignedBigInteger('ngonngu_id');
            $table->unsignedBigInteger('phanloai_id');
            $table->string('namxuatban');
            $table->string('giaban');
            $table->foreign('theloai_id')->references('id')->on('the_loais')->onDelete('cascade');
            $table->foreign('ngonngu_id')->references('id')->on('ngon_ngus')->onDelete('cascade');
            $table->foreign('phanloai_id')->references('id')->on('phan_loais')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dau_saches');
    }
};
