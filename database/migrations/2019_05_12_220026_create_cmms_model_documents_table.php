<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmmsModelDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmms_model_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('url');
            $table->text('note')->nullable();
            $table->integer('model_id');
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
        Schema::dropIfExists('cmms_model_documents');
    }
}
