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
        Schema::table('catalog', function (Blueprint $table) {
            $table->dropForeign(['sheet_id']);
            $table->dropColumn('sheet_id');
            $table->dropColumn('picture');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('catalog', function (Blueprint $table) {
            $table->unsignedBigInteger('sheet_id')->nullable();
            $table->foreign('sheet_id')->references('id')->on('sheet_table');
            $table->string('picture')->nullable();
        });
    }
};
