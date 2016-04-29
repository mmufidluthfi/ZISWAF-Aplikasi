@extends('layouts.dashboard')

@section('content')

	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

		@elseif (Auth::user()->admin==2)

		<nav>
			<ul>
				<li class="section"><a href="{{ url('/dashboard/daftarpenggalangan')}}"> Crowdfunding</a>
					<ul class="submenu">
					<li><a href="{{ url('/dashboard/daftarpenggalangan')}}">Daftar Penggalangan Dana</a></li>
					<li><a href="{{ url('/dashboard/listPenggalangan')}}">List Pendanaan UMKM</a></li>
					<li><a href="{{ url('/dashboard/showReportPendanaan')}}">Laporan Crowdfunding</a></li>
					</ul>
				</li>
				<li ><a href="{{ url('/dashbord/daftarpendanaan')}}"> Pendanaan Usaha</a>
					<ul class="submenu">
					<li><a href="{{ url('/dashbord/daftarpendanaanbank')}}">Pengajuan Pendanaan</a></li>
					<li><a href="{{ url('/dashboard/listPendanaanBank')}}">List Pendanaan UMKM</a></li>
					<li><a href="{{ url('/dashboard/showReportPendanaan')}}">Laporan Crowdfunding</a></li>
					</ul>
				</li>
				
				<li><a href="{{ url('/dashboard/pendanaan')}}"> Pendanaan</a></li>
				<li><a href="{{ url('/dashboard/laporan')}}/{{ Auth::user()->id }}">Laporan</a></li>
				<li><a href="{{ url('/dashboard/pengaturan')}}">Pengaturan</a></li>
			</ul>
			<br/><br/><center><img src="{{URL::to('/')}}../images/logo_white.png "/></center>
		</nav>
			

			<!--Input Laporan Baru-->
			<section class="content">
				<section class="widget">
					<header>
						<span class="icon">&#128196;</span>
						<hgroup>
							<h1>Buat Laporan Baru</h1>
							
						</hgroup>
					</header>
					<div class="content">
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
								<tr>
									<form action="{{ URL::to('createLaporanCrowd') }}" method="post" enctype="multipart/form-data">
										{!! csrf_field() !!}

										<input type="hidden" value="{{ Auth::user()->id }}" name="id_user">

										<td>
											<select name="id_pendanaan">
									 			@foreach ($tampilnamaproyek as $tpl)
									 				<option value="{{ $tpl->id_pendanaan }}">{{ $tpl->nama_proyek }}</option>
									 			@endforeach
									 		</select>
										</td>
										<td>
											<select name="bulan">
											    <option value="1">Januari</option>
											    <option value="2">Februari</option>
											    <option value="3">Maret</option>
											    <option value="4">April</option>
											    <option value="5">Mei</option>
											    <option value="6">Juni</option>
											    <option value="7">Juli</option>
											    <option value="8">Agustus</option>
											    <option value="9">September</option>
											    <option value="10">Oktober</option>
											    <option value="11">November</option>
											    <option value="12">Desember</option>
											</select>
										</td>
										<td>
											<input type="text" name="tahun">
										</td>
										<td><button type="submit" class="green">Post</button></td>
									</form>
								</tr>
								</tbody>
							</table>
							
					</div>
				</section>
			</section>


			<section class="content">
				<section class="widget">
					<header>
						<span class="icon">&#128196;</span>
						<hgroup>
							<h1>Pendanaan</h1>
							<h2>Laporan Penggunaan Dana Penggalangan</h2>
						</hgroup>
					</header>
					<div class="content">
					
						<table id="myTable" border="0" width="100">
							<thead>
								<tr>
									<th>Nama Proyek</th>
									<th>Bulan</th>
									<th>Tahun</th>
									<th>Total Pengeluaran</th>
									<th>Total Pemasukan </th>
									<th>Saldo Proyek</th>
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
								
									<td><a href="{{ URL::to('/lkm/detail_laporan_crowdfunding/'.$rc->id_laporan_c)}}"><button>Lihat</button></a></td>
									
								</tr>
								@endforeach
								</tbody>
							</table>
							
					</div>
				</section>
			</section>
		

		@elseif (Auth::user()->admin==1)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

		@elseif (Auth::user()->admin==0)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
		
	@endif

@endsection
