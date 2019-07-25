<div class="banner inner-banner" id="home">
	<div class="container" style="top: calc(50% + 0.5em); position: relative;">
		<div class="row">
			<div class="col-12">
				@if(isset($page_header))
					<h2 class="white">{{ $page_header }}</h2>
				@else
					<h2 class="white">{{ $seo_array["title"] }}</h2>
				@endif
			</div>
		</div>
	</div>
</div>