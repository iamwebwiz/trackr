<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trackingID')->unique();
            $table->string('geolocation');
            $table->text('shipper_address');
            $table->text('receiver_address');
            $table->string('origin');
            $table->string('destination');
            $table->string('shipment_type');
            $table->string('payment_mode');
            $table->string('departure_time');
            $table->string('package');
            $table->string('carrier');
            $table->string('weight');
            $table->string('product');
            $table->integer('totalFreight');
            $table->string('pickup_date');
            $table->string('pickup_time');
            $table->string('expected_delivery_date');
            $table->integer('quantity');
            $table->string('shipment_mode');
            $table->string('shipment_status');
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
        Schema::dropIfExists('trackings');
    }
}
