<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmmsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmms_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('model');
            $table->string('brands_id')->references('id')->on('brands')->nullable(true);
            $table->string('description',512)->nullable(true);
            $table->string('photo',256)->nullable(true);
            $table->integer('subcategory_id')->references('id')->on('categories')->nullable(true);
            $table->integer('categories_id')->references('id')->on('categories')->nullable(true);
            $table->string('website')->nullable(true);
            $table->string('rfaac')->nullable(true);
            $table->integer('voltage')->nullable(true);
            $table->integer('hospital_id')->references('midgard.accounts_hospitals')->nullable(true);
            $table->timestampTz('created_at')->useCurrent();
            $table->timestampTz('updated_at')->nullable(true);
            $table->timestampTz('deleted_at')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmms_models');
    }
}
