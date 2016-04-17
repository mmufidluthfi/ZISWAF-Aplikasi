@extends('layouts.dashboard')

@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@else
	<nav>
		<ul>
			<li><a href="{{ url('/dashboard/home')}}"><span class="icon">&#128711;</span> Dashboard</a></li>
			<li><a href="{{ url('/dashboard/pendanaan')}}/{{ Auth::user()->id }}"><span class="icon">&#127758;</span> Pendanaan</a></li>
			<li><a href="{{ url('/dashboard/laporan')}}/{{ Auth::user()->id }}"><span class="icon">&#128203;</span> Laporan</a></li>
			<li class="section">
				<a href="#"><span class="icon">&#9881;</span>Pengaturan</a>
				<ul class="submenu">
					<li><a href="{{ url('/dashboard/edit-profile')}}">Edit Profile</a></li>
					<li><a href="{{ url('/dashboard/edit-foto')}}">Ganti Foto</a></li>
					<li class="section"><a href="{{ url('/dashboard/edit-password')}}">Ganti Password</a></li>
				</ul>
			</li>
		</ul>
		<br/><br/><center><img src="{{URL::to('/')}}../images/logo_white.png "/></center>
	</nav>

	<section class="content">
		<section class="widget" style="height: 300px; min-height:200px">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Ganti Password</h1>
					<h2>Silahkan Ganti Password Anda Disini</h2>
				</hgroup>
			</header>
			<div class="content">
				<div class="field-wrap">
					<input type="text" value="Password Lama"/>
				</div>
				<div class="field-wrap">
					<input type="text" value="Password Baru"/>
				</div>
				<div class="field-wrap">
					<input type="text" value="Konfirmasi Password Baru"/>
				</div>
					<button type="submit" class="green">Simpan</button>
			</div>
		</section>
	</section>

	@endif
	
@endsection

