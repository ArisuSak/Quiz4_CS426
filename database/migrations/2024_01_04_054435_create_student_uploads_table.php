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
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->integer('gender');
            $table->string('file_path');
            $table->string('storage_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('uploads', function (Blueprint $table) {
            $table->dropColumn('storage_type');
        });
    }
};
