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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->nullable();
            $table->integer('ci')->unique();
            $table->string('ci_dep');
            $table->string('last_name');
            $table->boolean('is_active');
            $table->date('birth_date')->nullable();
            $table->string('gender');
            $table->integer('phone')->nullable();
            $table->string('address')->nullable();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('ci');
            $table->string('ci_dep');
            $table->string('last_name');
            $table->boolean('state');
            $table->date('birth_date');
            $table->string('gender');
            $table->integer('phone');
            $table->string('address');
        });
    }
};
