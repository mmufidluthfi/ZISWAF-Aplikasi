@extends('layouts.dashboard')

	@section('content')
	<nav>
		<ul>
			<li class="section"><a href="{{ url('/dashboard/home')}}"><span class="icon">&#128711;</span> Dashboard</a></li>
			<li ><a href="{{ url('/dashboard/pendanaan')}}"><span class="icon">&#127758;</span> Pendanaan</a></li>
			<li ><a href="{{ url('/dashboard/laporan')}}"><span class="icon">&#128203;</span> Laporan</a></li>
			<li>
				<a href="#"><span class="icon">&#9881;</span>Pengaturan</a>
				<ul class="submenu">
					<li><a href="{{ url('/dashboard/edit-profile')}}">Edit Profile</a></li>
					<li><a href="{{ url('/dashboard/edit-foto')}}">Ganti Foto</a></li>
					<li><a href="{{ url('/dashboard/edit-password')}}">Ganti Password</a></li>
				</ul>
			</li>
		</ul>
		<br/><br/><center><img src="{{URL::to('/')}}../images/logo_white.png "/></center>
	</nav>
	
		<section class="content">
			<div class="widget-container">
			<center>
					<a href="{{ url('/dashboard/pendanaan')}}"><img src="{{URL::to('dashboard/images/button_pendanaan.png')}}" alt="" width="300" height="300" /></a> 
					<a href="{{ url('/dashboard/laporan')}}"><img src="{{URL::to('dashboard/images/button_laporan.png')}}" alt="" width="300" height="300" /></a> 
					<a href="{{ url('/dashboard/edit-profile')}}"><img src="{{URL::to('dashboard/images/button_profile.png')}}" alt="" width="300" height="300" /></a> 
			</center>
			</div>
		</section>
	
@endsection

