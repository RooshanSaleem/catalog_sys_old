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
        Schema::create('catalog_sheet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catalog_id');
            $table->unsignedBigInteger('sheet_id');
            $table->timestamps();

            $table->foreign('catalog_id')->references('id')->on('catalog');
            $table->foreign('sheet_id')->references('id')->on('sheet_table');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_sheet');
    }
};
