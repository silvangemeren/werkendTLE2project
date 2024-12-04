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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('vacancy_id');
                $table->dateTime('applied_at')->default(now());
                $table->string('status')->default('submitted');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('vacancy_id')->references('id')->on('vacancies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
