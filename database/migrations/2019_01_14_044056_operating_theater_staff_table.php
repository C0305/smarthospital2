<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OperatingTheaterStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operating_theater_staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->string('rol')->nullable(true);
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
        //
    }
}
