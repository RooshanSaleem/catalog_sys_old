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
        Schema::table('equipment_sheet', function (Blueprint $table) {
            $table->integer('rif')->nullable();
            $table->string('expiry')->nullable();
            $table->string('temperature')->nullable();
            $table->string('special_instructions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('equipment_sheet', function (Blueprint $table) {
            $table->dropColumn('rif');
            $table->dropColumn('expiry');
            $table->dropColumn('temperature');
            $table->dropColumn('special_instructions');
        });
    }
};
