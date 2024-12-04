<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveEmployerIdFromVacancies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            // Verwijder de foreign key constraint
            $table->dropForeign(['employer_id']);

            // Verwijder de employer_id kolom
            $table->dropColumn('employer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            // Voeg de employer_id kolom opnieuw toe
            $table->unsignedBigInteger('employer_id');

            // Voeg de foreign key constraint opnieuw toe
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
        });
    }
}
