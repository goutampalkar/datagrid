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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('head_id')
                    ->nullable()
                    ->constrained('head_of_families')
                    ->onUpdate('SET NULL')
                    ->onDelete('CASCADE');
            $table->string('fname')->nullable(false);
            $table->string('lname')->nullable(false);
            $table->date('bdate')->nullable(false);
            $table->string('marital_sts')->nullable(false);
            $table->string('education')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};
