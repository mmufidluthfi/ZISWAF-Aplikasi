@extends('layouts.dashboard')

	@section('content')
	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

	@else
	<nav>
		<ul>
			<li><a href="{{ url('/dashboard/home')}}"><span class="icon">&#128711;</span> Dashboard</a></li>
			<li><a href="{{ url('/dashboard/pendanaan')}}/{{ Auth::user()->id }}"><span class="icon">&#127758;</span> Pendanaan</a></li>
			<li class="section"><a href="{{ url('/dashboard/laporan')}}/{{ Auth::user()->id }}"><span class="icon">&#128203;</span> Laporan</a></li>
			<li><a href="{{ url('/dashboard/pengaturan')}}"><span class="icon">&#9881;</span>Pengaturan</a></li>
		</ul>
		<br/><br/><center><img src="{{URL::to('/')}}../images/logo_white.png "/></center>
	</nav>

	<section class="content">
		<section class="widget">
			<header>
				<span class="icon">&#128196;</span>
				<hgroup>
					<h1>Laporan</h1>
					<h2>Laporan UMKM Pendanaan ZISWAF Produktif</h2>
				</hgroup>
			</header>
			<div class="content">
				<table id="myTable" border="0" width="100">
					<thead>
						<tr>
							<th>ID UMKM</th>
							<th>Pemilik UMKM</th>
							<th>Keterangan</th>
							<th>Tanggal Upload</th>
							<th>Laporan</th>
						</tr>
					</thead>
						<tbody>
							<tr>
								<td><input type="checkbox" /> 00001</td>
								<td>Muhammad Mufid Luthfi</td>
								<td>Lebih bermanfaat</td>
								<td>01/4/2016</td>
								<td><a href="#">Download</a></td>
							</tr>
							<tr>
								<td><input type="checkbox" /> 00002</td>
								<td>Reicka Sofi Azzura</td>
								<td>Untung Banyak</td>
								<td>02/4/2016</td>
								<td><a href="#">Download</a></td>
							</tr>
							<tr>
								<td><input type="checkbox" /> 00003</td>
								<td>Nana Ramadhewi</td>
								<td>Masih Rugi</td>
								<td>03/4/2016</td>
								<td><a href="#">Download</a></td>
							</tr>
							<tr>
								<td><input type="checkbox" /> 00004</td>
								<td>Elzar</td>
								<td>Masih Rugi</td>
								<td>04/4/2016</td>
								<td><a href="#">Download</a></td>
							</tr>
						</tbody>
					</table>
			</div>
		</section>
	</section>

	@endif
	
@endsection