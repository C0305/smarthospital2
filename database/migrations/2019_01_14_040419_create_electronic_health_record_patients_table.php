<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectronicHealthRecordPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electronic_health_record_patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('mother_last_name')->nullable(true);
            $table->enum('gender', ['Masculino','Femenino','Sin especificar','Otro']);
            $table->string('allergies',1000)->nullable(true);
            $table->date('birthday')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('mobile')->nullable(true);
            $table->string('marital_status')->nullable(true);
            $table->string('blood_group')->nullable(true);
            $table->integer('address_id')->nullable(true);
            $table->integer('hospitals_id')->nullable(true);
            $table->integer('created_user')->nullable(true);
            $table->timestampTz('created_at')->useCurrent();
            $table->timestampTz('updated_at')->nullable(true);
            $table->timestampTz('deleted_at')->nullable(true);
        });

        // Full Text Index
        \Illuminate\Support\Facades\DB::statement('ALTER TABLE electronic_health_record_patients ADD FULLTEXT fulltext_index (name, last_name, mother_last_name)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('electronic_health_record_patients');
    }
}
