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

            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Shipper Address
                        </div>
                        <div class="panel-body">
                            {{ $tracking->shipper_address }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Receiver Address
                        </div>
                        <div class="panel-body">
                            {{ $tracking->receiver_address }}
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
                                    <h4>Carrier:</h4> {{ $tracking->carrier }}
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
                                    <h4>Payment Mode:</h4> {{ $tracking->payment_mode }}
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <h4>Total Freight:</h4> {{ $tracking->totalFreight }}
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <h4>Expected Delivery Date:</h4> {{ $tracking->expected_delivery_date }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <h4>Departure Time:</h4> {{ $tracking->departure_time }}
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <h4>Pick-up Date:</h4> {{ $tracking->pickup_date }}
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <h4>Pick-up Time:</h4> {{ $tracking->pickup_time }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </body>
</html>
