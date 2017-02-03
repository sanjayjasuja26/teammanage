<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Team Manage</title>


    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
      <link href="/css/teammanage.css" rel="stylesheet">


</head>

<body class="">


    <div id="wrapper">
       @include('includes.left_nav_admin_front')
        <div id="page-wrapper" class="gray-bg">
          @include('includes.header_nav_admin_front')
          @yield('content')
          @include('includes.footer_admin_front')
        </div>

      </div>


    <!-- Mainly scripts -->
    <script src="/js/jquery-2.1.1.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/js/inspinia.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9OjIkc5WLaXix3tyqiEyW_G6-VoT3siw&callback=initMap">
    </script>
      <script src="/js/app.js"></script>




        @yield('extrascript')



</body>

</html>
