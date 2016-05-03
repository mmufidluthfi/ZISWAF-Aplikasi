@extends('layouts.dashboard')

@section('content')

	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

		@elseif (Auth::user()->admin==2)

		<nav>
		<ul>
			<li><a href="#"> Penggalangan Dana</a>
				<ul class="submenu">
				<li><a href="{{ url('/lkm/listcrowd')}}/{{ Auth::user()->id }}">Daftar Penggalangan Dana</a></li>
				<li><a href="{{ url('/lkm/laporancrowd')}}/{{ Auth::user()->id }}">Laporan Penggalangan Dana</a></li>
				</ul>
			</li>
			<li ><a href="#"> Pendanaan Usaha</a>
			<ul class="submenu">
				<li><a href="{{ url('/lkm/dashboard-pendanaanusaha')}}/{{ Auth::user()->id }}">Daftar Pendanaan Bank</a></li>
				<li><a href="{{ url('/lkm/dashboard-reportpendanaanbank')}}/{{ Auth::user()->id }}">Laporan Pendanaan Bank</a></li>
			</ul>
			</li>
			
			<li><a href="#"> Pendanaan Lembaga ZISWAF</a>
			<ul class="submenu">
				<li><a href="{{ url('/lkm/dashboard-listpendanaanziswaf')}}/{{ Auth::user()->id }}">Daftar Pendanaan Lembaga</a></li>
				<li><a href="{{ url('/lkm/dashboard-reportpendanaanziswaf/')}}/{{ Auth::user()->id }}">Laporan Pendanaan Lembaga</a></li>
				</ul>
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

		@elseif (Auth::user()->admin==1)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

		@elseif (Auth::user()->admin==0)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
		
	@endif

@endsection

