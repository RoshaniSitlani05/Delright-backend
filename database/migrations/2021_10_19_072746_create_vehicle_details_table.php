<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('insurance');
            $table->string('rcbook');
            $table->string('driving_license');
            $table->string('puc_certificate');
            $table->string('vehicle_image1');
            $table->string('vehicle_image2');
            $table->string('vehicle_image3');
            $table->string('vehicle_image4');
            $table->timestamps();
            $table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_details');
    }
}
