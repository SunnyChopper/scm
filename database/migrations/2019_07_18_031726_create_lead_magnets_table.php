<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadMagnetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_magnets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title', 256);
            $table->text('promise')->nullable();
            $table->text('hook')->nullable();
            $table->integer('category')->nullable();
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
        Schema::dropIfExists('lead_magnets');
    }
}
