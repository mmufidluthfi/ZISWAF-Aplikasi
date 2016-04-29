@extends('layouts.dashboard')

@section('content')

	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

		@elseif (Auth::user()->admin==2)
			
			<nav>
				<ul>
					<li><a href="{{ url('/dashboard/daftarpenggalangan')}}"> Crowdfunding</a>
						<ul class="submenu">
						<li><a href="{{ url('/dashboard/daftarpenggalangan')}}">Daftar Penggalangan Dana</a></li>
						<li><a href="{{ url('/dashboard/listPenggalangan')}}">List Pendanaan UMKM</a></li>
						<li><a href="{{ url('/dashboard/showReportPendanaan')}}">Laporan Crowdfunding</a></li>
						</ul>
					</li>
					<li ><a href="{{ url('/dashbord/daftarpendanaan')}}"> Pendanaan Usaha</a>
						<ul class="submenu">
						<li><a href="{{ url('/dashboard/daftarpendanaanbank')}}">Pengajuan Pendanaan</a></li>
						<li><a href="{{ url('/dashboard/listPendanaanBank')}}">List Pendanaan UMKM</a></li>
						<li><a href="{{ url('/dashboard/showReportPendanaanBank')}}">Laporan Crowdfunding</a></li>
						</ul>
					</li>
					
					<li><a href="{{ url('/dashboard/pendanaan')}}"> Pendanaan Lembaga ZISWAF</a>
					<ul class="submenu">
						<li><a href="{{ url('/dashboard/listPendanaanZiswaf')}}">List Pendanaan UMKM</a></li>
						<li><a href="{{ url('/dashboard/showReportPendanaanZiswaf')}}">Laporan Crowdfunding</a></li>
						</ul>
					</li>
					
				</ul>
				<br/><br/><center><img src="{{URL::to('/')}}../images/logo_white.png "/></center>
			</nav>
			
			<br><br>
			<section class="content">
			<section class="widget">

				<header>
					<span class="icon">&#128196;</span>
					<hgroup>
						<h1>List Pendanaan</h1>
						<h2>Daftar Pendanaan yang diperoleh dari lembaga ziswaf</h2>
					</hgroup>
				</header>
				<div class="content">
					
					<table id="myTable" border="0" >
						<thead>
						<tr>
							<th>Nama Transaksi</th>
							<th>Kategori</th>
							<th>Tanggal Transaksi</th>
							<th>Total Dana</th>
						</tr>
						</thead>
						<tbody>
							@foreach($reportpendanaan as $rpdn)
							<tr>
								<td>{{$rpdn->nama_pendanaan}}</td>
								<td>{{$rpdn->kategori}}</td>
								<td>{{$rpdn->tgl_pendanaan}}</td>
								<td>{{$rpdn->total_dana}}</td>						
							</tr>
							@endforeach
						</tbody>
					</table>

					<br><br>
					<?php echo $reportpendanaan->render(); ?>
					
				</div>
			</section>
			</section>	

		@elseif (Auth::user()->admin==1)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

		@elseif (Auth::user()->admin==0)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
		
	@endif

@endsection
