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
				<li><a href="{{ url('/person/dashboard-reportusahabank')}}/{{ Auth::user()->id }}">Laporan Pendanaan Bank</a></li>
			</li>
			</ul>
			<li ><a href="{{ url('/person/dashboard-pendanaancrowd')}}/{{ Auth::user()->id }}">Laporan Proyek</a></li>
			<li ><a href="{{ url('/person/dashboard-pendanaanziswaf')}}/{{ Auth::user()->id }}">Laporan Ziswaf </a>
			</li>
			
		</ul>
		</nav>
			
			<section class="content">
				<section class="widget">
					<header>
						<span class="icon">&#128196;</span>
						<hgroup>
							<h1>Laporan Penggunaan Dana Penggalangan</h1>
						</hgroup>
					</header>
					<div class="content">
						<center><font size="+2">List Laporan</font></center><br>
						<div style="overflow-x:auto;">
						<table id="myTable" border="0" width="100">
							<thead>
								<tr>
									<th>Nama Proyek</th>
									<th>Bulan</th>
									<th>Tahun</th>
									<th>Total Pengeluaran (Rp)</th>
									<th>Total Pemasukan (Rp)</th>
									<th>Saldo Proyek (Rp)</th>
									<th>Action</th>
								</tr>
							</thead>
								<tbody>
								@foreach($reportbulanan as $rc)		
								
								<tr>
									<td>{{$rc->nama_proyek}}</td>
									<td>{{date('F', mktime(0, 0, 0, $rc->bulan, 10))}}</td>
									<td>{{$rc->tahun}}</td>
									<td>{{$rc->total_pengeluaran}}</td>
									<td>{{$rc->total_pemasukan}}</td>
									<td>{{$rc->saldo_usaha}}
									</td>
								
									<td><a href="{{ URL::to('/person/dashboard-detailreportpendanaan/'.$rc->id_laporan_c.'/'. Auth::user()->id)}}"><button>Lihat</button></a></td>
									
								</tr>

								@endforeach
								</tbody>
							</table>
							<div style="overflow-x:auto;">
							<br/><?php echo $reportbulanan->render(); ?>
					</div>
				</section>
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
