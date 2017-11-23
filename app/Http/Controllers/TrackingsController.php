<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackingsController extends Controller
{
    protected $data;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAllTrackings()
    {
        $this->data['trackings'] = \App\Tracking::paginate(30);
        return view('tracking/index', $this->data);
    }

    public function showNewTrackingForm()
    {
        return view('tracking/new');
    }

    public function addNewTracking(Request $request)
    {
        $tracking = new \App\Tracking;
        $tracking->trackingID = str_random(7);
        $tracking->geolocation = $request->geolocation;
        $tracking->latitude = $request->latitude;
        $tracking->longitude = $request->longitude;
        $tracking->shipper_address = $request->shipper_address;
        $tracking->receiver_address = $request->receiver_address;
        $tracking->origin = $request->origin;
        $tracking->destination = $request->destination;
        $tracking->shipment_type = $request->shipment_type;
        $tracking->payment_mode = $request->payment_mode;
        $tracking->departure_time = $request->departure_time;
        $tracking->package = $request->package;
        $tracking->carrier = $request->carrier;
        $tracking->weight = $request->weight;
        $tracking->product = $request->product;
        $tracking->totalFreight = $request->totalFreight;
        $tracking->pickup_date = $request->pickup_date;
        $tracking->pickup_time = $request->pickup_time;
        $tracking->expected_delivery_date = $request->expected_delivery_date;
        $tracking->quantity = $request->quantity;
        $tracking->shipment_mode = $request->shipment_mode;
        $tracking->shipment_status = $request->shipment_status;
        $tracking->save();
        return redirect()->route('showAllTrackings')->with('success', 'Tracking Added Successfully!');
    }
}
