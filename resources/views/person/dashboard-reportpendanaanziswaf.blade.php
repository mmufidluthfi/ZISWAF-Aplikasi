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
								<h2>Laporan Penggunaan Dana ZISWAF</h2>
							</hgroup>
						</header>
							<br><br>
							<center><font size="+2">List Laporan</font></center><br>
							<div style="overflow-x:auto;">
							<table id="myTable" border="0" width="100">
								<thead>
									<tr>
										<th>Nama Pendanaan</th>
										<th>Bulan</t>
										<th>Tahun</th>
										<th>Total Pengeluaran (Rp)</th>
										<th>Total Pemasukan (Rp)</th>
										<th>Saldo Proyek (Rp)</th>
										<th>Action</th>
									</tr>
								</thead>
									<tbody>
										@foreach($reportZiswaf as $rc)
										<tr>
											<td>{{$rc->nama_pendanaan}}</td>
											<td>{{date('F', mktime(0, 0, 0, $rc->bulan, 10))}}</td>
											<td>{{$rc->tahun}}</td>
											<td>{{$rc->total_pengeluaran}}</td>
											<td>{{$rc->total_pemasukan}}</td>
											<td>{{$rc->saldo_usaha}}
											</td>
											<td><a href="{{ URL::to('/person/dashboard-detailreportpendanaanziswaf/'.$rc->id_laporan_z.'/'. Auth::user()->id)}}"><button>Lihat</button></a></td>
											
										</tr>
										@endforeach
										</tbody>
								</table>
								</div>
								<br/><?php echo $reportZiswaf->render(); ?>
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

