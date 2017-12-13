<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Online Tracker</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Stylesheet -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <style>
            body {
                padding-top: 50px;
                background-image: url({{ url('images/boat-cargo.jpg') }});
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                font-family: Raleway;
                font-weight: bold;
            }
            h1,h2,h3,h4,h5,h6 {
                font-weight: bolder;
            }
        </style>

    </head>
    <body>

        <div class="container" align="center">

            <img src="{{ asset('images/AXon.png') }}" alt="Logo" style="margin-bottom:50px;">

            <div style="padding:20px 50px;margin:5px 0px 20px 0px;background-color:lightgray;color:#000;font-family:Raleway;clear:both;
            font-size:30px;font-weight:bolder">
                TRACK YOUR SHIPPING INFORMATION
            </div>
            <div class="clearfix"></div>

            <form action="{{ route('displayTrackingDetails') }}" method="post" class="form-inline">
                {{ csrf_field() }}

                <div class="form-group" style="margin-right:30px">
                    <label for="trackingID" class="sr-only">Tracking ID</label>
                    <input type="text" name="trackingID" placeholder="Enter Tracking ID" class="form-control"
                    style="padding-left:30px;padding-right:30px;padding-top:25px;padding-bottom:25px;font-family:Raleway;
                    font-weight:bold">
                </div>

                <div class="form-group">
                    <button class="btn btn-warning" type="submit" style="background:#ff6700;color:#fff;font-family:Raleway;
                    font-weight:bolder;padding-top:15px;padding-bottom:15px;padding-right:30px;padding-left:30px">
                        TRACK RESULT
                    </button>
                </div>

            </form>

            <div class="container" style="margin-top:50px" align="center">
                <a href="http://axonfreight.com/" target="_blank" class="btn btn-warning"
                style="background:#ff6700;color:#fff;font-family:Raleway;font-weight:bolder;
                padding-top:15px;padding-bottom:15px;padding-right:30px;padding-left:30px;width:30%">
                    Go To Main Site
                </a>
            </div>

            <hr>

            @if (empty($tracking))
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-body text-center">
                                <h1 class="text-danger">NO RESULT FOUND FOR THIS TRACKING ID</h1>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="col-md-4 col-sm-4">
                                <h3>TRACKING NO: {{ $tracking->trackingID }}</h3>
                                <br>
                                <img src="{{ asset('images/barcode.png') }}" alt="Barcode">
                                <br><br>
                                <a href="{{ asset('images/trackings/'.$tracking->image) }}" target="_blank">
                                    <img src="{{ asset('images/trackings/'.$tracking->image) }}" width="250" alt="Tracking Image"
                                    class="img-thumbnail">
                                </a>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                @if (is_null($tracking->geolocation))
                                    <div id="map" style="width:100%;height:400px;border:none;border-radius:10px"></div>
                                    <script>
                                        var map;
                                        function initMap() {
                                            var latitude = {{ $tracking->latitude }};
                                            var longitude = {{ $tracking->longitude }};
                                            map = new google.maps.Map(document.getElementById('map'), {
                                                center: {lat: latitude, lng: longitude},
                                                zoom: 19
                                            });
                                            var marker = new google.maps.Marker({
                                                position: {lat: latitude, lng: longitude},
                                                map: map
                                            });
                                        }
                                    </script>
                                    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHV6Sxsq5XldAyCAtirJoj7VVrotpz92c
                                    &callback=initMap" async defer></script>
                                @else
                                    <iframe src="http://www.google.com/maps/embed/v1/place?q={{ $tracking->geolocation }}
                                        &zoom=18&attribution_source=Google+Maps+Embed+API
                                        &attribution_web_url=https://developers.google.com/maps/documentation/embed/
                                        &key=AIzaSyBmMgh9QLh_fn9d51SbcsZa7O98Aw86T9s" allowfullscreen
                                        style="width:100%;height:400px;border:none;border-radius:10px">
                                    </iframe>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Shipper Address
                            </div>
                            <div class="panel-body">
                                {!! $tracking->shipper_address !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Receiver Address
                            </div>
                            <div class="panel-body">
                                {!! $tracking->receiver_address !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Origin:</h4> {!! $tracking->origin !!}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Package:</h4> {!! $tracking->package !!}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Status:</h4> {!! $tracking->shipment_status !!}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Destination:</h4> {!! $tracking->destination !!}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Carrier:</h4> {!! $tracking->carrier !!}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Departure Time:</h4> {!! $tracking->departure_time !!}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Type of Shipment:</h4> {!! $tracking->shipment_type !!}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Weight:</h4> {!! $tracking->weight.'kg' !!}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Shipment Mode:</h4> {!! $tracking->shipment_mode !!}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Carrier Reference No.</h4> {!! $tracking->trackingID !!}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Product:</h4> {!! $tracking->product !!}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Quantity:</h4> {!! $tracking->quantity !!}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Pick-up Time:</h4> {!! $tracking->pickup_time !!}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Pick-up Date:</h4> {!! $tracking->pickup_date !!}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Expected Delivery Date:</h4> {!! $tracking->expected_delivery_date !!}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Payment Mode:</h4> {!! $tracking->payment_mode !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Shipment History</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <th>Location</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status/Activity</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($tracking->shipmentHistories()->orderBy('created_at', 'desc')->get() as $history)
                                                <tr>
                                                    <td>{{ $history->location }}</td>
                                                    <td>{{ date('d/m/Y', strtotime($history->date)) }}</td>
                                                    <td>{{ date('H:ia', strtotime($history->time)) }}</td>
                                                    <td>{{ $history->status }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>

    </body>
</html>
