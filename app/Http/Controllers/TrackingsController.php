<?php

namespace App\Http\Controllers;

use App\ShipmentHistory;
use App\Tracking;
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
        if (!is_null($request->image)) {
            $filepath = $request->carrier.time().'.'.$request->image->getClientOriginalExtension();
            $image = $request->image->move(public_path('images/trackings'), $filepath);
            $tracking->image = $filepath;
        }
        $tracking->carrier = $request->carrier;
        $tracking->weight = $request->weight;
        $tracking->product = $request->product;
        $tracking->pickup_date = $request->pickup_date;
        $tracking->pickup_time = $request->pickup_time;
        $tracking->expected_delivery_date = $request->expected_delivery_date;
        $tracking->quantity = $request->quantity;
        $tracking->shipment_mode = $request->shipment_mode;
        $tracking->shipment_status = $request->shipment_status;

        if ($tracking->save()) {
            $history = new ShipmentHistory;
            $history->location = $request->shipping_location;
            $history->date = $request->shipping_date;
            $history->time = $request->shipping_time;
            $history->status = $request->shipping_status;
            $tracking->shipmentHistories()->save($history);

            return redirect()->route('showAllTrackings')->with('success', 'Tracking Added Successfully!');
        }
        return back()->with('err', 'Oops, An Error Occured!');
    }

    public function showEditTrackingForm($id)
    {
        $this->data['tracking'] = \App\Tracking::where('trackingID', $id)->first();
        return view('tracking/edit', $this->data);
    }

    public function editTracking(Request $request, $id)
    {
        $this->data['tracking'] = \App\Tracking::where('trackingID', $id)->first();

        $this->data['tracking']->geolocation = $request->geolocation;
        $this->data['tracking']->latitude = $request->latitude;
        $this->data['tracking']->longitude = $request->longitude;
        $this->data['tracking']->shipper_address = $request->shipper_address;
        $this->data['tracking']->receiver_address = $request->receiver_address;
        $this->data['tracking']->origin = $request->origin;
        $this->data['tracking']->destination = $request->destination;
        $this->data['tracking']->shipment_type = $request->shipment_type;
        $this->data['tracking']->payment_mode = $request->payment_mode;
        $this->data['tracking']->departure_time = $request->departure_time;
        $this->data['tracking']->package = $request->package;
        if (!is_null($request->image)) {
            $filepath = $request->carrier.time().'.'.$request->image->getClientOriginalExtension();
            $image = $request->image->move(public_path('images/trackings'), $filepath);
            $this->data['tracking']->image = $filepath;
        }
        $this->data['tracking']->carrier = $request->carrier;
        $this->data['tracking']->weight = $request->weight;
        $this->data['tracking']->product = $request->product;
        $this->data['tracking']->pickup_date = $request->pickup_date;
        $this->data['tracking']->pickup_time = $request->pickup_time;
        $this->data['tracking']->expected_delivery_date = $request->expected_delivery_date;
        $this->data['tracking']->quantity = $request->quantity;
        $this->data['tracking']->shipment_mode = $request->shipment_mode;
        $this->data['tracking']->shipment_status = $request->shipment_status;
        $this->data['tracking']->save();
        return redirect()->route('showAllTrackings')->with('info', 'Tracking details updated');
    }

    public function delete($id)
    {
        \App\Tracking::where('trackingID', $id)->delete();
        return back()->with('info', 'Tracking Information deleted');
    }

    public function newShipmentHistory(Request $request, $id)
    {
        $tracking = Tracking::where('trackingID', $id)->first();
        $history = new ShipmentHistory;
        $history->location = $request->shipping_location;
        $history->date = $request->shipping_date;
        $history->time = $request->shipping_time;
        $history->status = $request->shipping_status;
        $tracking->shipmentHistories()->save($history);
        return back()->with('success', 'Shipment History Added');
    }
}
