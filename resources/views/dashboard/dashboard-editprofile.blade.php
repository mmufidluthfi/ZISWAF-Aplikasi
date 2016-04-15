@extends('layouts.dashboard')

	@section('content')
	<nav>
		<ul>
			<li><a href="{{ url('/dashboard/home')}}"><span class="icon">&#128711;</span> Dashboard</a></li>
			<li><a href="{{ url('/dashboard/pendanaan')}}/{{ Auth::user()->id }}"><span class="icon">&#127758;</span> Pendanaan</a></li>
			<li><a href="{{ url('/dashboard/laporan')}}/{{ Auth::user()->id }}"><span class="icon">&#128203;</span> Laporan</a></li>
			<li class="section">
				<a href="#"><span class="icon">&#9881;</span>Pengaturan</a>
				<ul class="submenu">
					<li class="section"><a href="{{ url('/dashboard/edit-profile')}}">Edit Profile</a></li>
					<li><a href="{{ url('/dashboard/edit-foto')}}">Ganti Foto</a></li>
					<li><a href="{{ url('/dashboard/edit-password')}}">Ganti Password</a></li>
				</ul>
			</li>
		</ul>
		<br/><br/><center><img src="{{URL::to('/')}}../images/logo_white.png "/></center>
	</nav>

	<section class="content">
		<section class="widget" style="height: 550px; min-height:400px">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Edit Profile</h1>
					<h2>Silahkan Edit Profile Anda Disini</h2>
				</hgroup>
			</header>
			<div class="content">
				<div class="field-wrap">
					<input type="text" value="Nama Lengkap"/>
				</div>
				<div class="field-wrap">
					<input type="text" value="Email"/>
				</div>
				<div class="field-wrap">
					<input type="text" value="No HP"/>
				</div>
				<div class="field-wrap">
					<input type="text" value="Alamat"/>
				</div>
				<div class="field-wrap wysiwyg-wrap">
					<br/><b>Biografi Singkat :</b>
					<textarea rows="4" value="Biografi Singkat"></textarea>
				</div>
					<button type="submit" class="green">Simpan</button>
			</div>
		</section>
	</section>

@endsection