<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Decision Making System</title>
	<link href="{{ URL::asset('bank/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ URL::asset('bank/css/lazarus.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Exo+2:400,300,200,600,700&subset=latin,cyrillic" rel="stylesheet" type="text/css">

	@if (Auth::guest())
	<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />
	@elseif (Auth::user()->admin==0)
		<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
	@elseif (Auth::user()->admin==1)
		<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
	@elseif (Auth::user()->admin==2)
		<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
	@elseif (Auth::user()->admin==4)
		<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

	@elseif (Auth::user()->admin==3)

</head>

<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
					aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{url('/bank/home/')}}">Bank Funding | ZISWAF Apps</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" ><i class="glyphicon glyphicon-user"></i> {{ Auth::user()->name }} </a>
					</li>
					<li>
						<a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-off"></i> Logout</a>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>

	@yield('content')

	<script src="{{ URL::asset('bank/js/jquery.js')}}"></script>
	<script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
</body>

@endif
</html>