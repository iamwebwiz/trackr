@extends('layouts.app')

@section('title')
    All Trackings | {{ env('APP_NAME') }}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3">
                <div class="list-group">
                    <a href="{{ url('home') }}" class="list-group-item">
                        Dashboard
                    </a>
                    <a href="{{ url('trackings') }}" class="list-group-item active">
                        All Trackings <span class="badge">{{ DB::table('trackings')->count() }}</span>
                    </a>
                    <a href="{{ url('trackings/new') }}" class="list-group-item">
                        Add New Tracking
                    </a>
                </div>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Generated Trackings</h4>
                    </div>
                    @include('partials.alerts')
                    <div class="panel-body">
                        @if (count($trackings) > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>Tracking ID</th>
                                        <th>Origin</th>
                                        <th>Destination</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($trackings as $tracking)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $tracking->trackingID }}</td>
                                                <td>{{ $tracking->origin }}</td>
                                                <td>{{ $tracking->destination }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $trackings->links() }}
                        @else
                            <h3>No Tracking Recorded, Yet.</h3>
                            <a href="{{ url('trackings/new') }}" class="btn btn-default btn-md">
                                ADD NEW TRACKING RECORD
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
