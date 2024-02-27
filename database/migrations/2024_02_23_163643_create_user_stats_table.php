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
        Schema::create('user_stats', function (Blueprint $table) {
            $table->id();
            $table->string('user')->nullable();
            $table->string('user_ip');
            $table->string('browser_used');
            $table->string('environment');
            $table->foreignId('user_id')->constrained();
            $table->string('action');
            $table->string('table_changed');
            $table->string('data_changed');
            $table->integer('data_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_stats');
    }
};
