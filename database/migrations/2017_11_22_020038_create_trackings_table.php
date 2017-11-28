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
            $table->string('geolocation')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('shipper_address')->nullable();
            $table->text('receiver_address')->nullable();
            $table->string('origin')->nullable();
            $table->string('destination')->nullable();
            $table->string('shipment_type')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('departure_time')->nullable();
            $table->string('package')->nullable();
            $table->string('image')->nullable();
            $table->string('carrier')->nullable();
            $table->string('weight')->nullable();
            $table->string('product')->nullable();
            $table->date('pickup_date')->nullable();
            $table->string('pickup_time')->nullable();
            $table->date('expected_delivery_date')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('shipment_mode')->nullable();
            $table->string('shipment_status')->nullable();
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
