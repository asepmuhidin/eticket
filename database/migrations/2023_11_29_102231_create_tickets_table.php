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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('type_id');
            $table->foreignId('status_id');
            $table->string('subject');
            $table->text('message');
            $table->foreignId('delegateTo')->nullable();
            $table->text('attachment')->nullable();
            $table->boolean('level1_confirm')->default(false);
            $table->date('level1_confirm_date')->nullable();
            $table->boolean('level2_confirm')->default(false);
            $table->date('level2_confirm_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
