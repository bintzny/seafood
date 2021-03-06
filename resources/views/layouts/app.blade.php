<!DOCTYPE html>
<html>
    <head>
        <title>Vida App Starter with Flat Admin V.3</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>

        <link rel="stylesheet" type="text/css" href="{{asset('flat-admin/css/vendor.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('flat-admin/css/flat-admin.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
        <!-- Theme -->
        <link rel="stylesheet" type="text/css" href="{{asset('flat-admin/css/theme/blue-sky.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('flat-admin/css/theme/blue.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('flat-admin/css/theme/red.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('flat-admin/css/theme/yellow.css')}}">

    </head>

    <body>
        <div class="app app-default">

            @include('layouts.sidebar')

            <div class="app-container">
        
                @include('layouts.header')
                @include('layouts.float-button')
                
                @include('layouts.success-errors')
                @yield('content')
                @include('layouts.footer')

            </div>
        </div>
      
        <script type="text/javascript" src="{{asset('flat-admin/js/vendor.js')}}"></script>
        <script type="text/javascript" src="{{asset('flat-admin/js/app.js')}}"></script>
        <script src="{{ asset('js/jquery.datatables.js') }}"></script>
        <script src="{{ asset('js/sweetalert2.js') }}"></script>
    @yield('script')
    </body>

</html>