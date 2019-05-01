<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatingTheaterSnorsrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operating_theater_snorsr', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->nullable(true);
            $table->string('solicitude',1024)->nullable(true);
            $table->string('provider')->nullable(true);
            $table->string('code')->nullable(true);
            $table->integer('procedures_id')->nullable(true);
            $table->integer('procedure_schedule_id')->nullable(true);
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
        Schema::dropIfExists('operating_theater_snorsr');
    }
}
