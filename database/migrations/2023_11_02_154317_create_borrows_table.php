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
        Schema::create('borrows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reader_id');
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('loan_slip_id');
            $table->foreign('reader_id')->references('id')->on('readers');
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('loan_slip_id')->references('id')->on('loan_slips');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
