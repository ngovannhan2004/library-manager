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
        Schema::create('phieu_muons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dg_id');
            $table->unsignedBigInteger('sach_id');
            $table->string('nguoichomuon');
            $table->string('ngaytra');
            $table->string('hantra');
            $table->string('nguoinhan');
            $table->foreign('dg_id')->references('id')->on('doc_gias')->onDelete('cascade');
            $table->foreign('sach_id')->references('id')->on('saches')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_muons');
    }
};
