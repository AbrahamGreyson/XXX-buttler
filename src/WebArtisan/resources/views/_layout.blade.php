<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description"
        content="Laravel Elektra WebArtisan provides a alternative way to access artisan command, this might help someone who's not familiar with terminal or prefer web vision, even most of people use terminal at this point though.">
  <meta name="author" content="abraham greyson">
  <meta name="email" content="82011220@qq.com">
  <meta name="license" content="mit">
  <link rel="icon" href="../../favicon.ico">

  <title>Laravel Elektra Webartisan</title>

  <!-- Bootstrap core CSS -->
  <link href="/vendor/elektra-webartisan/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/elektra-webartisan/css/docs.css" rel="stylesheet">
  <link href="/vendor/elektra-webartisan/css/nprogress.css" rel="stylesheet">
  <link href="/vendor/elektra-webartisan/css/app.css" rel="stylesheet">

  <!-- Custom styles for this template -->
{{--<link href="grid.css" rel="stylesheet">--}}

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="/vendor/elektra-webartisan/js/ie10-viewport-bug-workaround.js"></script>
</head>

<body>

<div class="navbar navbar-dark bg-inverse navbar-fixed-top" id="top-navbar">
  <div class="container">
    <a href="#" class="navbar-brand">Elektra webartisan</a>
  </div>
</div>

<div class="container bs-docs-container"  id="elektra-container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-9">
      @yield('formTitle')
      @include('flash::message')
      <form method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @yield('content')
      </form>
    </div>
    <div class="col-md-3">
      @include('elektra-webartisan::_sidebar')
    </div>
  </div>

  <hr>

  <footer>
    <p>&copy; Company 2014</p>
  </footer>
</div> <!-- /container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/vendor/elektra-webartisan/js/jquery.min.js"></script>
{{--<script src="/vendor/elektra-webartisan/js/bootstrap.min.js"></script>--}}
<script src="/vendor/elektra-webartisan/js/jquery.pjax.js"></script>
<script src="/vendor/elektra-webartisan/js/nprogress.js"></script>
<script src="/vendor/elektra-webartisan/js/app.js"></script>
</body>
</html>
