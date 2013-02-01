<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>
			@section('title')
			Demo Title
			@show
		</title>

		<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/css/bootstrap-responsive.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/css/site.css') }}" rel="stylesheet">
		
		<script src="{{ asset('assets/js/jquery-1.9.0.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	</head>

	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>

					<div class="nav-collapse collapse">
						<ul class="nav">
							<li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{ URL::to('/') }}">{{ Lang::get('general.homepage') }}</a></li>
							@if (Auth::check())
								<li {{ (Request::is('order') ? 'class="active"' : '') }}><a href="{{ URL::to('order') }}">{{ Lang::get('general.cart') }}</a></li>
							@endif
						</ul>

						<ul class="nav pull-right">
							@if (Auth::check())
								<li class="navbar-text">{{ Lang::get('general.greetings') }}, {{ Auth::user()->fullName() }}</li>
								<li class="divider-vertical"></li>
								
								<li {{ (Request::is('account') ? 'class="active"' : '') }}><a href="{{ URL::to('account') }}">{{ Lang::get('general.profile') }}</a></li>
								<li><a href="{{ URL::to('account/logout') }}">{{ Lang::get('general.logout') }}</a></li>
							@else
							<li {{ (Request::is('account/login') ? 'class="active"' : '') }}><a href="{{ URL::to('account/login') }}">{{ Lang::get('general.login') }}</a></li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container">
			@include('notifications')

			@yield('content')
		</div>
	</body>
</html>