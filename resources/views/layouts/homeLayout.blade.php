<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>TrendLine</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="eCommerce HTML Template Free Download" name="keywords">
  <meta content="eCommerce HTML Template Free Download" name="description">
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">


  <!-- CSS Libraries -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="{{  asset('lib/slick/slick.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/slick/slick-theme.css') }}" rel="stylesheet">
  <script src="{{ asset('imgs/lightbox-plus-jquery.min.js') }}" type="text/javascript"></script>
  <!--  Stylesheet -->
  <link href="{{ asset('css/index.css') }}" rel="stylesheet">
  <link href="{{ asset('imgs/sales banner/c.css') }}" rel="stylesheet">
</head>

<body>

  @yield('main')
  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('lib/easing/easing.min.js')  }}"></script>
  <script src="{{ asset('lib/slick/slick.min.js')  }}"></script>

  <!--  Javascript -->
  <script src="{{ asset('imgs/index.js') }}"></script>
  <script src="{{ asset('imgs/sales banner/app.js') }}"></script>

</body>

</html>