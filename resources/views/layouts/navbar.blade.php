<header class="py-4">
	<div class="container">
			<div id="logo">
				<h1><a href="{{ url('/') }}"><span class="fa fa-cloud" aria-hidden="true"></span> SunnyChopper Media</a></h1>
			</div>
		<!-- nav -->
		<nav class="d-lg-flex">

			<label for="drop" class="toggle"><span class="fa fa-bars" aria-hidden="true"></span></label>
			<input type="checkbox" id="drop" />

			@if(Auth::guest() && App\Custom\ClientHelper::isLoggedIn() == false && App\Custom\AdminHelper::isLoggedIn() == false)			
			<ul class="menu mt-2 ml-auto">
				<li><a href="{{ url('/') }}">Home</a></li>
				{{-- <li class=""><a href="{{ url('/') }}">Tips & Advice</a></li> --}}
				<li><a href="{{ url('/pricing') }}">Pricing</a></li>

				<li>
					<!-- First Tier Drop Down -->
					<label for="drop-2" class="toggle">Services <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
					<a style="color: white;">Services <span class="fa fa-angle-down" aria-hidden="true"></span></a>
					<input type="checkbox" id="drop-2"/>
					<ul class="inner-ul">
						<li><a href="{{ url('/services/web-apps') }}">Web Apps</a></li>
					</ul>
				</li>

				<li>
					<!-- First Tier Drop Down -->
					<label for="drop-3" class="toggle">Tools <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
					<a style="color: white;">Tools <span class="fa fa-angle-down" aria-hidden="true"></span></a>
					<input type="checkbox" id="drop-3"/>
					<ul class="inner-ul">
						<li><a href="{{ url('/clients/tools/lead-builder') }}">Lead Magnet Builder Kit</a></li>
					</ul>
				</li>

				<li><a href="{{ url('/contact') }}">Contact</a></li>
				<li><a href="{{ url('/clients/register') }}">Register</a></li>
			</ul>
			<div class="login-icon ml-lg-2">
				<a class="user" href="{{ url('/clients/login') }}">Login</a>
			</div>
			@elseif(App\Custom\ClientHelper::isLoggedIn() == true && App\Custom\AdminHelper::isLoggedIn() == false)
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
			@elseif(App\Custom\AdminHelper::isLoggedIn() == true)
			<ul class="menu mt-2 ml-auto">
				<li><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
				<li>
					<label for="drop-4" class="toggle">Clients <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
					<a href="{{ url('/admin/clients') }}">Clients <span class="fa fa-angle-down" aria-hidden="true"></span></a>
					<input type="checkbox" id="drop-4"/>
					<ul class="inner-ul">
						<li><a href="{{ url('/admin/logs') }}">Logs</a></li>
						<li><a href="{{ url('/admin/tasks') }}">Tasks</a></li>
					</ul>
				</li>

				<li>
					<label for="drop-5" class="toggle">Products <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
					<a href="{{ url('/admin/products') }}">Products <span class="fa fa-angle-down" aria-hidden="true"></span></a>
					<input type="checkbox" id="drop-5"/>
					<ul class="inner-ul">
						<li><a href="{{ url('/admin/revenue') }}">Revenue</a></li>
						<li><a href="{{ url('/admin/orders') }}">Orders</a></li>
					</ul>
				</li>

				<li>
					<label for="drop-5" class="toggle">Tools <span class="fa fa-angle-down" aria-hidden="true"></span> </label>
					<a style="color: white;">Tools <span class="fa fa-angle-down" aria-hidden="true"></span></a>
					<input type="checkbox" id="drop-5"/>
					<ul class="inner-ul">
						<li><a href="{{ url('/admin/premium-content') }}">Premium Content</a></li>
					</ul>
				</li>
				
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