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
            $table->dropForeign(['employer_id']);

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
            $table->unsignedBigInteger('employer_id');

            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
        });
    }
}
