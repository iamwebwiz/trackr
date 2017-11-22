<?php

use Illuminate\Database\Seeder;

class TrackingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tracking = new \App\Tracking;

        $tracking->trackingID = str_random(7);
        $tracking->geolocation = 'Ibadan';
        $tracking->shipper_address = 'Lagos';
        $tracking->receiver_address = 'Magboro, Lagos';
        $tracking->origin = 'Magboro, Lagos';
        $tracking->destination = 'Surulere, Lagos';
        $tracking->shipment_type = 'Free Shipping via Ferris Air';
        $tracking->payment_mode = 'MasterCard Nigeria';
        $tracking->departure_time = '08:30';
        $tracking->package = 'Silver Items';
        $tracking->carrier = 'Ferris Air';
        $tracking->weight = '400kg';
        $tracking->product = 'Silver Items';
        $tracking->totalFreight = '40';
        $tracking->pickup_date = '2017-11-22';
        $tracking->pickup_time = '08:30';
        $tracking->expected_delivery_date = '2017-11-25';
        $tracking->quantity = '3';
        $tracking->shipment_mode = 'Helicopter';
        $tracking->shipment_status = 'Shipping Via Ferris Air';
        $tracking->save();
    }
}
