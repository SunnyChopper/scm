<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwareProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->string('title', 128);
            $table->text('description')->nullable();
            $table->string('use_case_link', 256)->nullable();
            $table->string('design_class_link', 256)->nullable();
            $table->double('price');
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
        Schema::dropIfExists('software_products');
    }
}
