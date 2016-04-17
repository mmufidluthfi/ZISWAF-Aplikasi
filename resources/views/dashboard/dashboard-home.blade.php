@extends('layouts.dashboard')

@section('content')

	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@else

		<nav>
			<ul>
				<li class="section"><a href="{{ url('/dashboard/home')}}"><span class="icon">&#128711;</span> Dashboard</a></li>
				<li><a href="{{ url('/dashboard/pendanaan')}}/{{ Auth::user()->id }}"><span class="icon">&#127758;</span> Pendanaan</a></li>
				<li><a href="{{ url('/dashboard/laporan')}}/{{ Auth::user()->id }}"><span class="icon">&#128203;</span> Laporan</a></li>
				<li><a href="{{ url('/dashboard/pengaturan')}}"><span class="icon">&#9881;</span>Pengaturan</a></li>
			</ul>
			<br/><br/><center><img src="{{URL::to('/')}}../images/logo_white.png "/></center>
		</nav>
		
			<section class="content">
				<div class="widget-container">
					<center><p style="color:red"><?php echo Session::get('pesan-uploadsukses'); ?></p></center>
				</div>
				<div class="widget-container">
				<center>
						<a href="{{ url('/dashboard/pendanaan')}}/{{ Auth::user()->id }}"><img src="{{URL::to('dashboard/images/button_pendanaan.png')}}" alt="" width="300" height="300" /></a> 
						<a href="{{ url('/dashboard/laporan')}}/{{ Auth::user()->id }}"><img src="{{URL::to('dashboard/images/button_laporan.png')}}" alt="" width="300" height="300" /></a> 
						<a href="{{ url('/dashboard/pengaturan')}}"><img src="{{URL::to('dashboard/images/button_profile.png')}}" alt="" width="300" height="300" /></a> 
				</center>
				</div>
			</section>
	@endif
@endsection

