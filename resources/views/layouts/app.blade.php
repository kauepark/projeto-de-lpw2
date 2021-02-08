<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>To Do List</title>
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	</head>
	<body>
		<div id="app">
			<nav class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="{{ url('/') }}">
							To Do List
						</a>
					</div>
					<div class="collapse navbar-collapse" id="app-navbar-collapse">
						<ul class="nav navbar-nav">
							&nbsp;
						</ul>
						<ul class="nav navbar-nav navbar-right">
							@if (Auth::guest())
								<li><a href="{{ route('login') }}">Login</a></li>
								<li><a href="{{ route('register') }}">Criar conta</a></li>
							@else
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
										{{ Auth::user()->name }} <span class="caret"></span>
									</a>
									<ul class="dropdown-menu" role="menu">
										<li>
											<a href="{{ route('logout') }}"
												onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
												Deslogar
											</a>
											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
											</form>
										</li>
									</ul>
								</li>
							@endif
						</ul>
					</div>
				</div>
			</nav>
			@yield('content')
		</div>
		<script src="{{ asset('js/app.js') }}"></script>
	</body>
</html>
