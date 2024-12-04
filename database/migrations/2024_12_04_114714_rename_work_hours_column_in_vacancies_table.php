<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->renameColumn('work-hours', 'work_hours');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('vacancies', function (Blueprint $table) {
            $table->renameColumn('work_hours', 'work-hours');
        });
    }
};
