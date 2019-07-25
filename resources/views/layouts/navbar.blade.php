<header class="py-4">
	<div class="container">
			<div id="logo">
				<h1><a href="{{ url('/') }}"><span class="fa fa-cloud" aria-hidden="true"></span> SunnyChopper Media</a></h1>
			</div>
		<!-- nav -->
		<nav class="d-lg-flex">

			<label for="drop" class="toggle"><span class="fa fa-bars" aria-hidden="true"></span></label>
			<input type="checkbox" id="drop" />

			@if(Auth::guest() && App\Custom\ClientHelper::isLoggedIn() == false)			
			<ul class="menu mt-2 ml-auto">
				<li><a href="{{ url('/') }}">Home</a></li>
				{{-- <li class=""><a href="{{ url('/') }}">Tips & Advice</a></li> --}}
				<li><a href="{{ url('/pricing') }}">Pricing</a></li>

				<li>
					<!-- First Tier Drop Down -->
					<label for="drop-2" class="toggle">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
					<a href="{{ url('/services') }}">Services <span class="fa fa-angle-down" aria-hidden="true"></span></a>
					<input type="checkbox" id="drop-2"/>
					<ul class="inner-ul">
						<li><a href="{{ url('/services/web-dev') }}">Web Development</a></li>
					</ul>
				</li>

				<li><a href="{{ url('/contact') }}">Contact</a></li>
				<li><a href="{{ url('/clients/register') }}">Register</a></li>
			</ul>
			<div class="login-icon ml-lg-2">
				<a class="user" href="{{ url('/clients/login') }}">Login</a>
			</div>
			@elseif(App\Custom\ClientHelper::isLoggedIn() == true)
			<ul class="menu mt-2 ml-auto">
				<li><a href="{{ url('/clients/dashboard') }}">Dashboard</a></li>
				<li><a href="{{ url('/clients/premium') }}">Premium Content</a></li>
				<li>
					<!-- First Tier Drop Down -->
					<label for="drop-2" class="toggle">Tools <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
					<a href="{{ url('/clients/tools') }}">Tools <span class="fa fa-angle-down" aria-hidden="true"></span></a>
					<input type="checkbox" id="drop-2"/>
					<ul class="inner-ul">
						<li><a href="{{ url('/clients/tools/lead-builder') }}">Lead Magnet Builder Kit</a></li>
					</ul>
				</li>

				<li><a href="{{ url('/clients/orders') }}">Orders</a></li>

				@if(\App\Custom\InvoicesHelper::isCustomer(\App\Custom\ClientHelper::getID()) == true)
					<li>
						<!-- First Tier Drop Down -->
						<label for="drop-2" class="toggle">Tasks <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
						<a href="{{ url('/clients/tasks') }}">Tasks <span class="fa fa-angle-down" aria-hidden="true"></span></a>
						<input type="checkbox" id="drop-2"/>
						<ul class="inner-ul">
							<li><a href="{{ url('/clients/tasks/request') }}">Request Task</a></li>
						</ul>
					</li>

					<li><a href="{{ url('/clients/revenue') }}">Revenue</a></li>
					<li><a href="{{ url('/clients/logs') }}">Logs</a></li>
					<li><a href="{{ url('/clients/products') }}">Software Products</a></li>
				@endif

				
			</ul>
			<div class="login-icon ml-lg-2">
				<a class="user" href="{{ url('/clients/logout') }}">Logout</a>
			</div>
			@elseif(App\Custom\AdminHelper::isLoggedIn())
			<ul class="menu mt-2 ml-auto">
				<li><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
				<li><a href="{{ url('/admin/clients') }}">Clients</a></li>
				<li><a href="{{ url('/admin/logs') }}">Logs</a></li>
				<li><a href="{{ url('/admin/revenue') }}">Revenue</a></li>
				<li><a href="{{ url('/admin/tasks') }}">Tasks</a></li>
			</ul>
			<div class="login-icon ml-lg-2">
				<a class="user" href="{{ url('/admin/logout') }}">Logout</a>
			</div>
			@endif
		</nav>
		<div class="clear"></div>
		<!-- //nav -->
	</div>
</header>