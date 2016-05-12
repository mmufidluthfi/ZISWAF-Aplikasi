@extends('layouts.dashboard')

@section('content')

	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

		@elseif (Auth::user()->admin==5)

		<nav>
		<ul>
			
			<li ><a href="#"> Pendanaan Usaha</a>
			<ul class="submenu">
				<li><a href="{{ url('/person/dashboard-pendanaanusaha')}}/{{ Auth::user()->id }}">Daftar Pendanaan Bank</a></li>
				<li><a href="{{ url('/person/dashboard-reportpendanaanbank')}}/{{ Auth::user()->id }}">Laporan Pendanaan Bank</a></li>
			</li>
			</ul>
			<li ><a href="{{ url('/person/dashboard-pendanaancrowd')}}/{{ Auth::user()->id }}">Laporan Proyek</a></li>
			<li ><a href="{{ url('/person/dashboard-pendanaanziswaf')}}/{{ Auth::user()->id }}">Laporan Ziswaf </a>
			</li>
			
		</ul>
		</nav>
		
			<section class="content">
				<div class="widget-container">
					<center><p style="color:red"><?php echo Session::get('pesan-uploadsukses'); ?></p></center>
				</div>
				<div class="widget-container">
				<center>
						<a href="#"><img src="{{URL::to('dashboard/images/button_pendanaan.png')}}" alt="" width="300" height="300" /></a> 
						<a href="#"><img src="{{URL::to('dashboard/images/button_laporan.png')}}" alt="" width="300" height="300" /></a> 
						<a href="#"><img src="{{URL::to('dashboard/images/button_profile.png')}}" alt="" width="300" height="300" /></a> 
				</center>
				</div>
			</section>

		@elseif (Auth::user()->admin==0)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

		@elseif (Auth::user()->admin==1)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
		
		@elseif (Auth::user()->admin==3)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

		@elseif (Auth::user()->admin==4)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
		
	@endif

@endsection

