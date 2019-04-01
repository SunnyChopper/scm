<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTasksTableAddRiceScores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->integer('reach')->nullable();
            $table->integer('impact')->nullable();
            $table->integer('confidence')->nullable();
            $table->integer('ease')->nullable();
            $table->double('rice_score')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('reach');
            $table->dropColumn('impact');
            $table->dropColumn('confidence');
            $table->dropColumn('ease');
            $table->dropColumn('rice_score');
        });
    }
}
