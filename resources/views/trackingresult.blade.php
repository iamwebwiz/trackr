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
            }
        </style>
    </head>
    <body>

        <div class="container">

            <form action="{{ route('displayTrackingDetails') }}" method="post" class="form-inline">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="trackingID" class="sr-only">Tracking ID</label>
                    <input type="text" name="trackingID" placeholder="Enter Tracking ID" class="form-control">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">
                        TRACK RESULT
                    </button>
                </div>

            </form>

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
                    <div class="col-md-4 col-sm-4">
                        <h3>TRACKING NO: {{ $tracking->trackingID }}</h3>
                        <br>
                        <img src="{{ asset('images/barcode.png') }}" alt="Barcode">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        @if (!is_null($tracking->geolocaton))
                            <iframe src="//www.google.com/maps/embed/v1/place?q={{ urlencode($tracking->geolocation) }}
                                &zoom=10&attribution_source=Google+Maps+Embed+API
                                &attribution_web_url=https://developers.google.com/maps/documentation/embed/
                                &key=AIzaSyBmMgh9QLh_fn9d51SbcsZa7O98Aw86T9s" allowfullscreen
                                style="width:100%;height:400px;border:none;border-radius:10px">
                            </iframe>
                        @else
                            <div id="map" style="width:100%;height:400px;border:none;border-radius:10px"></div>
                            <script>
                                var map;
                                function initMap() {
                                    var latitude = '{{ $tracking->latitude }}';
                                    var longitude = '{{ $tracking->longitude }}';
                                    map = new google.maps.Map(document.getElementById('map'), {
                                        center: {lat: latitude, lng: longitude},
                                        zoom: 10
                                    });
                                }
                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlbr-P0KgUndoATbTMfpd551D8snb6J1c
                            &callback=initMap" async defer></script>
                        @endif
                    </div>
                </div>

                <hr>

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
                                        <h4>Origin:</h4> {{ $tracking->origin }}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Package:</h4> {{ $tracking->package }}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Status:</h4> {{ $tracking->shipment_status }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Destination:</h4> {{ $tracking->destination }}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Carrier:</h4> {{ $tracking->carrier }}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Departure Time:</h4> {{ $tracking->departure_time }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Type of Shipment:</h4> {{ $tracking->shipment_type }}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Weight:</h4> {{ $tracking->weight.'kg' }}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Shipment Mode:</h4> {{ $tracking->shipment_mode }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Carrier Reference No.</h4> {{ $tracking->trackingID }}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Product:</h4> {{ $tracking->product }}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Quantity:</h4> {{ $tracking->quantity }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Pick-up Time:</h4> {{ $tracking->pickup_time }}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Pick-up Date:</h4> {{ $tracking->pickup_date }}
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Expected Delivery Date:</h4> {{ $tracking->expected_delivery_date }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <h4>Payment Mode:</h4> {{ $tracking->payment_mode }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>

    </body>
</html>
