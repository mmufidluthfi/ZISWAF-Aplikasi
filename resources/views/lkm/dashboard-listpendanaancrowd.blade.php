@extends('layouts.dashboard')

@section('content')

	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

		@elseif (Auth::user()->admin==2)

			<nav>
				<ul>
					<li class="section"><a href="#" > Penggalangan Dana</a>
						<ul class="submenu">
						<li class="section"><a href="{{ url('/lkm/listcrowd')}}/{{ Auth::user()->id }}">Daftar Penggalangan Dana</a></li>
						<li><a href="{{ url('/lkm/laporancrowd')}}/{{ Auth::user()->id }}">Laporan Penggalangan Dana</a></li>
						</ul>
					</li>
					<li ><a href="#"> Pendanaan Usaha</a>
					<ul class="submenu">
						<li><a href="{{ url('/lkm/dashboard-pendanaanusaha')}}/{{ Auth::user()->id }}">Daftar Pendanaan Bank</a></li>
						<li><a href="{{ url('/dashboard/showReportPendanaanBank')}}">Laporan Pendanaan Bank</a></li>
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
			<br><br>
			<section class="content">
			<section class="widget">

				<header>
					<span class="icon">&#128196;</span>
					<hgroup>
						<h1>List Pendanaan</h1>
						<h2>Daftar Pendanaan yang dilakukan UMKM</h2>
					</hgroup>
				</header>
				<div class="content">
					<div style="overflow-x:auto;">
					<table id="myTable" border="0" >
						<thead>
							<tr>
								<th>Nama UMKM</th>
								<th>Proyek Pendanaan</th>
								<th>Kategori</th>
								<th>Total Dana</th>
								<th>Dana Sementara</th>
								<th>Tanggal Pengajuan</th>
								<th>Status </th>
							</tr>
						</thead>
						<tbody>
							@foreach($pendanaanlkm as $pda)
							<tr>
								<td>{{$pda->nama_pj}}</td>
								<td>{{$pda->nama_proyek}}</td>
								<td>{{$pda->kategori}}</td>
								<td>{{$pda->total_dana}}</td>
								<td>{{$pda->sementara_dana}}</td>
								<td>{{$pda->tgl_pendanaan}}</td>
								<td>{{$pda->status}}</td>							
							</tr>
							@endforeach
						</tbody>
					</table>
					</div>
					
					<?php echo $pendanaanlkm->render(); ?>
					
				</div>
			</section>
			</section>	
		

		@elseif (Auth::user()->admin==1)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

		@elseif (Auth::user()->admin==0)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
		
	@endif

@endsection

