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
            $table->bigIncrements('id');
            $table->string( 'name')->nullable();
            $table->text( 'image');
            $table->text('description')->nullable();
            $table->integer('brand_id');
            $table->integer('subcategory_id');
            $table->integer('category_id');
            $table->integer('rfaac');
            $table->string('voltage')->nullable();
            $table->string('website')->nullable();
            $table->softDeletesTz();
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
        Schema::dropIfExists('cmms_models');
    }
}
