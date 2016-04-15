@extends('layouts.dashboard')

	@section('content')
	<nav>
		<ul>
			<li><a href="{{ url('/dashboard/home')}}"><span class="icon">&#128711;</span> Dashboard</a></li>
			<li><a href="{{ url('/dashboard/pendanaan')}}/{{ Auth::user()->id }}"><span class="icon">&#127758;</span> Pendanaan</a></li>
			<li><a href="{{ url('/dashboard/laporan')}}"><span class="icon">&#128203;</span> Laporan</a></li>
			<li class="section">
				<a href="#"><span class="icon">&#9881;</span>Pengaturan</a>
				<ul class="submenu">
					<li><a href="{{ url('/dashboard/edit-profile')}}">Edit Profile</a></li>
					<li class="section"><a href="{{ url('/dashboard/edit-foto')}}">Ganti Foto</a></li>
					<li><a href="{{ url('/dashboard/edit-password')}}">Ganti Password</a></li>
				</ul>
			</li>
		</ul>
		<br/><br/><center><img src="{{URL::to('/')}}../images/logo_white.png "/></center>
	</nav>

	<section class="content">
		<div class="widget-container">
			<section class="widget small">
				<header>
					<span class="icon">&#59168;</span>
					<hgroup>
						<h1>Foto Profile</h1>
						<h2>Foto Frofile Anda Sekarang</h2>
					</hgroup>
				</header>
				<div class="content no-padding timeline">
						<div class="profile-img">
							<center><p><img src="images/uiface2.png" alt="" height="200" width="200" /></p></center>
						</div>
				</div>
			</section>
			
			<section class="widget small">
				<header> 
					<span class="icon">&#128362;</span>
					<hgroup>
						<h1>Ganti Foto Profile</h1>
						<h2>Disarankan Ukuran 200 x 200</h2>
					</hgroup>
				</header>
				<div class="content no-padding timeline">
					<div class="content">
						<form enctype="multipart/form-data">
						<div class="field-wrap">
							<input type="file" name="fileToUpload" id="fileToUpload">
						</div>
							<button type="submit" class="green">Update Foto</button>
						</form> 
					</div>
				</div>
			</section>
		</div>
	</section>
		
@endsection

