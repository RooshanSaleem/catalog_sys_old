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
        Schema::table('sheet_table', function (Blueprint $table) {
            $table->string('sheet_description')->nullable();
            $table->string('pic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('sheet_table', function (Blueprint $table) {
            $table->dropColumn('sheet_description');
            $table->dropColumn('pic');
        });
    }
};
