<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="{{ URL::asset('img/favicon.png') }}" type="image/png">

		<!-- Page title -->
		@if(isset($page_title))
			<title>{{ $page_title }} - {{ env('APP_NAME') }}</title>
		@else
			<title>{{ env('APP_NAME') }}</title>
		@endif

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('vendors/linericon/style.css') }}">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ URL::asset('vendors/owl-carousel/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('vendors/nice-select/css/nice-select.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('vendors/animate-css/animate.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('vendors/flaticon/flaticon.css') }}">

		<!-- Main css -->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/layouts.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
	</head>
	<body>
		@include('layouts.navbar')
		@yield('content')
		@include('layouts.footer')
		@include('layouts.js')
	</body>
</html>