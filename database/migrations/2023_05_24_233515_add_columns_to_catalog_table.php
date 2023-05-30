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
        Schema::table('catalog', function (Blueprint $table) {
            $table->integer('catalog_id');
            $table->string('catalog_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('catalog', function (Blueprint $table) {
            $table->dropColumn('catalog_id');
            $table->dropColumn('catalog_name');
        });
    }
};
