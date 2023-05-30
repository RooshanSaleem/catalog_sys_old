<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('glossary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->integer('item_id');
            $table->string('item_name');
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('glossary');
    }
};
