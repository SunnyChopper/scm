<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeforeAndAftersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('before_and_afters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('before_have')->nullable();
            $table->text('after_have')->nullable();
            $table->text('before_feel')->nullable();
            $table->text('after_feel')->nullable();
            $table->text('before_day')->nullable();
            $table->text('after_day')->nullable();
            $table->text('before_status')->nullable();
            $table->text('after_status')->nullable();
            $table->integer('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('before_and_afters');
    }
}
