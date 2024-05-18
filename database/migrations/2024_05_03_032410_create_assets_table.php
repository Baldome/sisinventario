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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('state');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('location_id');
            $table->date('admission_date');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('model')->nullable();
            $table->string('series')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('observations')->nullable();
            $table->timestamps();
            
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
