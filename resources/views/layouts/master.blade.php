<!doctype html>
<html>
<head>
  <meta charset=utf-8>
  <meta name="viewport" content="width=device-width;">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
@include('common.nav')
@yield('content')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</script>
</body>
</html>
