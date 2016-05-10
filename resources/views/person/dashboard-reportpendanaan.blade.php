@extends('layouts.dashboard')

@section('content')

	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

		@elseif (Auth::user()->admin==5)

		<nav>
			<ul>
				<li class="section"><a href="#" > Penggalangan Dana</a>
					<ul class="submenu">
					<li><a href="{{ url('/lkm/listcrowd')}}/{{ Auth::user()->id }}">Daftar Penggalangan Dana</a></li>
					<li class="section"><a href="{{ url('/lkm/laporancrowd')}}/{{ Auth::user()->id }}">Laporan Penggalangan Dana</a></li>
					</ul>
				</li>
				<li ><a href="#"> Pendanaan Usaha</a>
				<ul class="submenu">
					<li><a href="{{ url('/lkm/dashboard-pendanaanusaha')}}/{{ Auth::user()->id }}">Daftar Pendanaan Bank</a></li>
					<li><a href="{{ url('/lkm/dashboard-reportpendanaanbank')}}/{{ Auth::user()->id }}">Laporan Pendanaan Bank</a></li>
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
			
			<section class="content">
				<section class="widget">
					<header>
						<span class="icon">&#128196;</span>
						<hgroup>
							<h1>Laporan Penggunaan Dana Penggalangan</h1>
						</hgroup>
					</header>
					<div class="content">
						<center><font size="+2">Submit Laporan</font></center><br>
						<div style="overflow-x:auto;">
						<table id="myTable" border="0" width="100">
						<thead>
							<tr>
								<th>Nama Proyek</th>
								<th>Bulan</th>
								<th>Tahun</th>
								<th>Action</th>
							</tr>
						</thead>
							<tbody>
							
							</tbody>
						</table>
						</div>

						<br/><br/>
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
								
								</tbody>
							</table>
							
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
