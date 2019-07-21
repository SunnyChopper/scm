@extends('layouts.app')

@section('content')
	@include('layouts.home-banner')

	@include('layouts.about')

	@include('layouts.why-us')

	@include('layouts.services')

	@include('layouts.featured-video')

	{{-- @include('layouts.portfolio') --}}

	@include('layouts.partners')
@endsection