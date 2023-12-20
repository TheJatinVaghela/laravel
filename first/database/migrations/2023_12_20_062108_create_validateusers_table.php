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
        Schema::create('validateusers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('username',50)->default('GUEST');
            $table->string('useremail',100)->unique();
            $table->string('usercity',50);
            $table->integer('userage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validateusers');
    }
};
