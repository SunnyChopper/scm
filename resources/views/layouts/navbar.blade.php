<header class="header_area">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand logo_h" href="{{ url('/') }}"><img src="{{ URL::asset('img/logo.png') }}" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Collect the nav links, forms, and other content for toggling -->
				@if(App\Custom\AdminHelper::isLoggedIn())
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav justify-content-center">
							<li class="nav-item"><a class="nav-link" href="/admin/dashboard">Dashboard</a></li>

							<li class="nav-item submenu dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="/admin/clients">Clients</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="/admin/clients/new">Create New</a></li>
								</ul>
							</li>

							<li class="nav-item submenu dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="/admin/logs">Logs</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="/admin/logs/new">Create New</a></li>
								</ul>
							</li>

							<li class="nav-item submenu dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="/admin/revenue">Revenue</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="/admin/revenue/new">Create New</a></li>
								</ul>
							</li>
						</ul>
					</div>
				@elseif(App\Custom\ClientHelper::isLoggedIn())
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_na justify-content-center">
							<li class="nav-item"><a class="nav-link" href="/clients/dashboard">Dashboard</a></li>

							<li class="nav-item submenu dropdown">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="/clients/tasks">Tasks</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="/clients/tasks/request">Request Task</a></li>
								</ul>
							</li>

							<li class="nav-item"><a class="nav-link" href="/clients/revenue">Revenue</a></li>
							<li class="nav-item"><a class="nav-link" href="/clients/logs">Logs</a></li>
						</ul>
					</div>
				@else
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav justify-content-center">
							<li class="nav-item"><a class="nav-link" href="/">Home</a></li>
							{{-- <li class="nav-item"><a class="nav-link" href="">Tips & Advice</a></li> --}}
							<li class="nav-item"><a class="nav-link" href="/pricing">Pricing</a></li>
							<li class="nav-item submenu dropdown">
								<a href="/services" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="/services/web-dev">Web Development</a></li>
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="/apply" class="primary_btn text-uppercase">Apply Now</a></li>
						</ul>
					</div>
				@endif
			</div>
		</nav>
	</div>
</header>