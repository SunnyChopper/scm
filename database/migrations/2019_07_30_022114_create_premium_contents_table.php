<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremiumContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premium_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 128);
            $table->text('description')->nullable();
            $table->string('image_url', 256)->nullable();
            $table->integer('file_type');
            $table->string('content_url', 512);
            $table->string('category', 128);
            $table->integer('downloads')->default(0);
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
        Schema::dropIfExists('premium_contents');
    }
}
