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
                background-repeat: no-repeat;
                font-family: Raleway;
                font-weight: bold;
            }
        </style>
    </head>
    <body>

        <div class="container" align="center">

            <img src="{{ asset('images/AXon.png') }}" alt="Logo" style="margin-bottom:50px;">

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

        </div>

        <div class="container" style="margin-top:150px" align="center">
            <a href="http://axonfreight.com/" target="_blank" class="btn btn-warning"
            style="background:#ff6700;color:#fff;font-family:Raleway;font-weight:bolder;
            padding-top:15px;padding-bottom:15px;padding-right:30px;padding-left:30px;width:30%">
                Go To Main Site
            </a>
        </div>

    </body>
</html>
