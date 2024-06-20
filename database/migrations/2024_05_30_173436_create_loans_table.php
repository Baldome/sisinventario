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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tool_id');
            $table->unsignedBigInteger('borrower_user_id');
            $table->dateTime('date_time_loan');
            $table->dateTime('expected_return_date')->nullable();
            $table->dateTime('date_time_return')->nullable();
            $table->boolean('isBorrowed');
            $table->text('observations')->nullable();
            $table->timestamps();

            $table->foreign('tool_id')->references('id')->on('tools')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('borrower_user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
