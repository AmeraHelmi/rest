<!DOCTYPE html>
<html lang="en" class="no-js" >
    <head>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="Amera Helmi" />
        <title>المطعم</title>
        <link href="{{ asset('/admin-ui/assets/css/bootstrap-rtl.css') }}" rel="stylesheet" />
        <link href="{{ asset('/admin-ui/assets/css/font-awesome.css') }}" rel="stylesheet" />
        <link href="{{ asset('/admin-ui/assets/css/print.css') }}" media="print" rel="stylesheet" />
@yield('styles')

      </head>
      <body background="{{ asset('/admin-ui/assets/img/images/rest.jpg') }}" style="background-size: 100%;">
        @yield('content')
        <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME -->
        <!-- CORE JQUERY -->

        <script src="{{ asset('/admin-ui/assets/js/jquery-1.11.1.js') }}"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="{{ asset('/admin-ui/assets/js/bootstrap.js') }}"></script>


    </body>
</html>
