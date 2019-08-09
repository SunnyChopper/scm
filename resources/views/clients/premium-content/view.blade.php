@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class='container pt-64 pb-64'>
		<div class='row justify-content-center'>
			@if(count($content) > 0)
			@foreach($content as $c)
			<div class='col-lg-4 col-md-4 col-sm-12 col-12'>
				<div class='image-box-edge'>
					<div class='image-box-image set-bg' data-setbg='{{ $c->image_url }}'></div>
					<div class='image-box-info'>
						<h4 class='text-center'>{{ $c->title }}</h4>
						<p class='text-center'>{{ $c->description }}</p>

						@if($c->file_type == 1)
						<p class='text-center mb-0'><small><strong>File Type: </strong> Image</small></p>
						@elseif($c->file_type == 2)
						<p class='text-center mb-0'><small><strong>File Type: </strong> Document</small></p>
						@endif

						<p class='text-center mb-3'><small><strong>Category: </strong> {{ $c->category }}</small></p>
						<button type='button' data-id='{{ $c->id }}' class='btn btn-primary full-width download'>Download</button>
					</div>
				</div>
			</div>
			@endforeach
			@else
			<div class='col-lg-7 col-md-9 col-sm-11 col-12'>
				<div class='gray-box'>
					<h3 class='text-center'>No Premium Content!</h3>
					<p class='text-center'>You're early to the party! We're working hard on creating premium content.</p>
				</div>
			</div>
			@endif
		</div>
	</div>
@endsection

@section('page_js')
	<script type='text/javascript'>
		$('.set-bg').each(function() {
		    var bg = $(this).data('setbg');
		    console.log(bg);
		    $(this).css('background-image', 'url(' + bg + ')');
		});
	</script>
@endsection