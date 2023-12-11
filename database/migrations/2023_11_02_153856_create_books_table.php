<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('publisher_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('condition_id');
            $table->enum('available', ['yes', 'no', 'lost'])->default('yes');
            $table->foreign('publisher_id')->references('id')->on('publishing_companies');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('condition_id')->references('id')->on('conditions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
