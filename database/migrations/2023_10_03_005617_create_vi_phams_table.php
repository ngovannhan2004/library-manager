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
        Schema::create('vi_phams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dg_id');
            $table->string('lydo');
            $table->string('hinhthuc');
            $table->string('nguoixl');
            $table->foreign('dg_id')->references('id')->on('doc_gias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vi_phams');
    }
};
