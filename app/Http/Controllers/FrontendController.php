<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function showTrackingForm()
    {
        return view('track');
    }

    public function displayTrackingDetails(Request $request)
    {
        $data = array();
        $data['tracking'] = \App\Tracking::where('trackingID', $request->trackingID)->first();
        return view('trackingresult', $data);
    }
}
