@extends('layouts.dashboard')

@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@else
	<nav>
		<ul>
			<li><a href="{{ url('/dashboard/home')}}"><span class="icon">&#128711;</span> Dashboard</a></li>
			<li class="section"><a href="{{ url('/dashboard/pendanaan')}}/{{ Auth::user()->id }}"><span class="icon">&#127758;</span> Pendanaan</a></li>
			<li ><a href="{{ url('/dashboard/laporan')}}/{{ Auth::user()->id }}"><span class="icon">&#128203;</span> Laporan</a></li>
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
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Pendanaan</h1>
					<h2>Laporan Pendanaan Yang Anda Lakukan</h2>
				</hgroup>
			</header>
			<div class="content">
				<table id="myTable" border="0" width="100">
					<thead>
						<tr>
							<th>Judul Pendanaan</th>
							<th>Jenis Pendanaan</th>
							<th>Nominal Pendanaan</th>
							<th>Tanggal</th>
							<th>Status</th>
						</tr>
					</thead>
						<tbody>

							@foreach($pendanaantransaksi as $pdt)
									{{$pdt->pendanaan.nama_proyek}}
							@endforeach
						</tbody>
					</table>
			</div>
		</section>
	</section>

	@endif
	
@endsection

