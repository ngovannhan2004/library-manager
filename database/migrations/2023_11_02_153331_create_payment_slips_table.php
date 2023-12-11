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
        Schema::create('payment_slips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('returned_days');
            $table->string('violated');
            $table->unsignedBigInteger('reader_id');
            $table->foreign('reader_id')->references('id')->on('readers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_slips');
    }
};
