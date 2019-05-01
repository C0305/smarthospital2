<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatingTheaterProceduresPhasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operating_theater_procedures_phases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('procedures_id');
            $table->integer('procedure_process_id');
            $table->boolean('procedure_start')->nullable(true);
            $table->boolean('procedure_end')->nullable(true);
            $table->boolean('cleaning_start')->nullable(true);
            $table->boolean('cleaning_end')->nullable(true);
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
        Schema::dropIfExists('operating_theater_procedures_phases');
    }
}
