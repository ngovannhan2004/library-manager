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
        Schema::create('doc_gias', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sdt');
            $table->string('email');
            $table->string('gender');
            $table->string('nguoiCN');
            $table->string('ngaysinh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_gias');
    }
};
