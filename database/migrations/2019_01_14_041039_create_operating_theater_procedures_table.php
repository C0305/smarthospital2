<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatingTheaterProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operating_theater_procedures', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('datetime');
            $table->integer('patient_id');
            $table->integer('age');
            $table->integer('procedures_types_id');
            $table->integer('doctor_id');
            $table->string('anesthesiologist')->nullable(true);;
            $table->integer('who_schedule_user_id');
            $table->integer('hospitals_id');
            $table->integer('procedure_type')->nullable(true);
            $table->integer('procedure_process_id');
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
        Schema::dropIfExists('operatingTheater_procedures');
    }
}
