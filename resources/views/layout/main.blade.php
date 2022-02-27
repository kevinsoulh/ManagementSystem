<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title')</title>

	@yield('css')
</head>
<body class="nav-md">
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            </div>
        </div>
    </div>
    @yield('content')

	@yield('script')
</body>
</html>
