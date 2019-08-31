<!doctype html>
<html lang="en">
	<head>
		<!-- Required Meta Tags -->
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

		<!-- Page Title -->
		@if(isset($seo_array["title"]))
		<title>{{ $seo_array["title"] }} - {{ config('app.name') }}</title>
		@else
		<title>{{ config('app.name') }}</title>
		@endif

		<!-- Page Description -->
		@if(isset($seo_array["description"]))
		<meta property="description" content="{{ $seo_array["description"] }}">
		@else
		<meta property="description" content="We help businesses that are in need of more leads by building web applications on your site to attract your target audience to you and convert at higher percentages.">
		@endif

		<!-- Open Graph Meta Tags -->
		@if(isset($seo_array["og:title"]))
		<meta property="og:title" content="{{ $seo_array["og:title"] }}">
		@else
		<meta property="og:title" content="Automated Lead Generation Software - SunnyChopper Media">
		@endif

		@if(isset($seo_array["og:description"]))
		<meta property="og:description" content="{{ $seo_array["og:description"] }}">
		@else
		<meta property="og:description" content="We help businesses that are in need of more leads by building web applications on your site to attract your target audience to you and convert at higher percentages.">
		@endif

		@if(isset($seo_array["og:image"]))
		<meta property="og:image" content="{{ $seo_array["og:image"] }}">
		@else
		<meta property="og:image" content="https://pbs.twimg.com/profile_images/827712004471263232/G-tuFkkU.jpg">
		@endif

		@if(isset($seo_array["og:url"]))
		<meta property="og:url" content="{{ $seo_array["og:url"] }}">
		@else
		<meta property="og:url" content="https://sunnychoppermedia.com">
		@endif

		@if(isset($seo_array["twitter:card"]))
		<meta property="twitter:card" content="{{ $seo_array["twitter:card"] }}">
		@else
		<meta property="twitter:card" content="summary_large_image">
		@endif

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext,vietnamese" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link href="{{ URL::asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
	    <link href="{{ URL::asset('css/style.css') }}" rel='stylesheet' type='text/css' /><!-- custom css -->
	    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet">
	    <script src="https://kit.fontawesome.com/499c790285.js"></script>

		<!-- Main CSS -->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/layouts.css') }}">

		<!-- Facebook Pixel -->
		<script>
			!function(f,b,e,v,n,t,s)
			{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};
			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
			n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t,s)}(window, document,'script',
			'https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', '1225441154310154');
			fbq('track', 'PageView');
		</script>
		<noscript>
			<img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1225441154310154&ev=PageView&noscript=1"/>
		</noscript>
	</head>
	<body>
		@include('layouts.navbar')
		@yield('content')
		@include('layouts.footer')
		@include('layouts.js')
		@yield('page_js')
	</body>
</html>