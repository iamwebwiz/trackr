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
            }
        </style>
    </head>
    <body>

        <div class="container" align="center">

            <img src="{{ asset('images/AXon.png') }}" alt="Logo" style="margin-bottom:50px;">

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

        </div>

    </body>
</html>
