<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmmsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmms_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hid')->nullable(true);
            $table->integer('brands_id');
            $table->integer('models_id');
            $table->integer('hospital_id');
            $table->integer('location_id');
            $table->timestampTz('year')->nullable(true);
            $table->decimal('price',15,2)->nullable(true);
            $table->string('serial_number',256)->nullable(true);
            $table->string('lot_number',256)->nullable(true);
            $table->string('software_version',256)->nullable(true);
            $table->string('firmware_version')->nullable(true);
            $table->timestampTz('expiration_date')->nullable(true);
            $table->timestampTz('validity_guarantee')->nullable(true);
            $table->timestampTz('buy_date')->nullable(true);
            $table->integer('status_id')->nullable(true);
            $table->string('customs_door')->nullable(true);
            $table->timestampTz('requirement_number_date')->nullable(true);
            $table->string('requirement_number',256)->nullable(true);
            $table->integer('user_id')->nullable(true);
            $table->integer('ge')->nullable(true);
            $table->integer('history_of_problems')->nullable(true);
            $table->integer('maintenance_requirements')->nullable(true);
            $table->string('puerta_aduanal',256)->nullable(true);
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
        Schema::dropIfExists('cmms_products');
    }
}
