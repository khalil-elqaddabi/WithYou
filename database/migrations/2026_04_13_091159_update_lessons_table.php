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

    Schema::table('lessons', function (Blueprint $table) {
        $table->text('description')->nullable();
        $table->text('subject')->nullable();
        $table->text('links')->nullable();
        $table->string('file')->nullable();
        $table->string('image')->nullable();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
