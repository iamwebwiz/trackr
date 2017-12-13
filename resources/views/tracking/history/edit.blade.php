@extends('layouts.app')

@section('title')
    Edit Shipment History | {{ env('APP_NAME') }}
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
                        <h4>Edit Shipment History</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                @include('partials.alerts')
                                <form action="{{ route('editShipmentHistory', [
                                'id'=>$tracking->trackingID, 'history'=>$history->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('put') }}
                                    <div class="form-group">
                                        <label>Location</label>
                                        <div>
                                            <input type="text" name="shipping_location" placeholder="Shipment Location"
                                            class="form-control" value="{{ $history->location }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Date</label>
                                        <div>
                                            <input type="date" name="shipping_date" placeholder="Shipment Date"
                                            class="form-control" value="{{ $history->date }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Time</label>
                                        <div>
                                            <input type="time" name="shipping_time" placeholder="Shipment Time"
                                            class="form-control" value="{{ $history->time }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <div>
                                            <textarea name="shipping_status" rows="5" class="form-control"
                                            placeholder="Shipment Status">{{ $history->status }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-success" id="modal-save" type="submit">Update</button>
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
