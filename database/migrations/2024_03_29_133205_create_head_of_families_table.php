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
        Schema::create('head_of_families', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->nullable(false);
            $table->string('lname')->nullable(false);
            $table->string('phone')->nullable(false)->index();
            $table->date('bdate')->nullable(false);
            $table->string('marital_sts')->nullable(false);
            $table->longText('address')->nullable(false);
            $table->string('pincode')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('state')->nullable(false);
            $table->longText('hobbies')->nullable(false);
            $table->string('photo')->nullable(false);
            $table->string('member_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('head_of_families');
    }
};
