<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="{{ URL::asset('img/favicon.png') }}" type="image/png">

		<script>
			addEventListener("load", function () {
				setTimeout(hideURLbar, 0);
			}, false);

			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>

		<!-- Page title -->
		@if(isset($page_title))
			<title>{{ $page_title }} - {{ config('app.name') }}</title>
		@else
			<title>{{ env('APP_NAME') }}</title>
		@endif

		<link href="https://fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext,vietnamese" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link href="{{ URL::asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
	    <link href="{{ URL::asset('css/style.css') }}" rel='stylesheet' type='text/css' /><!-- custom css -->
	    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet">
	    <script src="https://kit.fontawesome.com/499c790285.js"></script>

		<!-- Main css -->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/layouts.css') }}">

	</head>
	<body>
		@include('layouts.navbar')
		@yield('content')
		@include('layouts.footer')
		@include('layouts.js')
		@yield('page_js')
	</body>
</html>