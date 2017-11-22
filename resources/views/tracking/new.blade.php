@extends('layouts.app')

@section('title')
    Add New Tracking | {{ env('APP_NAME') }}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3">
                <div class="list-group">
                    <a href="{{ url('home') }}" class="list-group-item">
                        Dashboard
                    </a>
                    <a href="{{ url('trackings') }}" class="list-group-item">
                        All Trackings <span class="badge">{{ DB::table('trackings')->count() }}</span>
                    </a>
                    <a href="{{ url('trackings/new') }}" class="list-group-item active">
                        Add New Tracking
                    </a>
                </div>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Add New Tracking Record</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                @include('partials.alerts')
                                <form action="{{ route('addNewTracking') }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="origin" class="control-label col-sm-4">Origin</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="origin" placeholder="Origin" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="destination" class="control-label col-sm-4">Destination</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="destination" placeholder="Destination" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="shipment_type" class="control-label col-sm-4">Shipment Type</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="shipment_type" placeholder="Shipment Type" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="payment_mode" class="control-label col-sm-4">Payment Mode</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="payment_mode" placeholder="Payment Mode" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="departure_time" class="control-label col-sm-4">Departure Time</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="departure_time" placeholder="Departure Time" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="package" class="control-label col-sm-4">Package</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="package" placeholder="Package" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="carrier" class="control-label col-sm-4">Carrier</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="carrier" placeholder="Carrier" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="weight" class="control-label col-sm-4">Weight (Kg)</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="weight" placeholder="Weight (Kg)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="product" class="control-label col-sm-4">Product</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="product" placeholder="Product" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="totalFreight" class="control-label col-sm-4">Total Freight</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="totalFreight" placeholder="Total Freight" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pickup_date" class="control-label col-sm-4">Pickup Date</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="pickup_date" placeholder="Pickup Date" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pickup_time" class="control-label col-sm-4">Pickup Time</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="pickup_time" placeholder="Pickup Time" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="expected_delivery_date" class="control-label col-sm-4">Expected Delivery Date</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="expected_delivery_date" placeholder="Expected Delivery Date" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="quantity" class="control-label col-sm-4">Quantity</label>
                                        <div class="col-sm-8">
                                            <input type="number" name="quantity" placeholder="Quantity" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="shipment_mode" class="control-label col-sm-4">Shipment Mode</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="shipment_mode" placeholder="Shipment Mode" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="shipment_status" class="control-label col-sm-4">Shipment Status</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="shipment_status" placeholder="Shipment Status" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="geolocation" class="control-label col-sm-4">Location</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="geolocation" placeholder="Location" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="shipper_address" class="control-label col-sm-4">Shipper Address</label>
                                        <div class="col-sm-8">
                                            <textarea name="shipper_address" rows="5" class="form-control"
                                            placeholder="Shipper Address"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="receiver_address" class="control-label col-sm-4">Receiver Address</label>
                                        <div class="col-sm-8">
                                            <textarea name="receiver_address" rows="5" class="form-control"
                                            placeholder="Receiver Address"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-4">
                                            <button class="btn btn-primary" type="submit">
                                                Add Tracking Record
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
