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
        Schema::create('loan_slips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('borrowed_days');
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
        Schema::dropIfExists('loan_slips');
    }


};
