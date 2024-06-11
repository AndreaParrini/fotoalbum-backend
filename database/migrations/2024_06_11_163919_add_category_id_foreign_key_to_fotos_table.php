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
        Schema::table('fotos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('category_id')->nullable();

            $table->foreign('user_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fotos', function (Blueprint $table) {
            //
            $table->dropForeign('fotos_category_id_foreign');
            $table->dropColumn('category_id');
        });
    }
};