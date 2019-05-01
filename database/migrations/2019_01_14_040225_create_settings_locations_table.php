<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('parent_id')->references('id')->on('settings_locations')->nullable(true);
            $table->integer('hospital_id')->references('id')->on('midgard.accounts_hospitals')->nullable(true);
            $table->integer('level');
            $table->string('area')->nullable(true);
            $table->string('type')->nullable(true);
            $table->text('description')->nullable(true);
            $table->integer('created_user')->nullable(true);
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
        Schema::dropIfExists('settings_locations');
    }
}
