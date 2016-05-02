@extends('layouts.dashboard')

@section('content')

	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

		@elseif (Auth::user()->admin==2)

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
			
			<section class="content">
				<section class="widget">
					<header>
						<span class="icon">&#128196;</span>
						<hgroup>
							<h1>Laporan Penggunaan Dana Penggalangan</h1>
						</hgroup>
					</header>
					<div class="content">
						<center><font size="+2">Submit Laporan Pendanaan Bank</font></center><br>
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
								<form action="{{ URL::to('createLaporanBank') }}" method="post">
									{!! csrf_field() !!}

									<input type="hidden" value="{{ Auth::user()->id }}" name="id_lkm">

									<td>
										<select name="id_pendanaan_bank">
								 			@foreach ($tampilnamabank as $tpb)
								 				<option value="{{ $tpb->id_pendanaan_bank }}">{{ $tpb->nama_proyek }}</option>
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

						<br/><br/>
						<center><font size="+2">List Laporan Pendanaan Bank</font></center><br>
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
								@foreach($reportBank as $rpb)		
								<tr>
									<td>{{$rpb->nama_proyek}}</td>
									<td>{{date('F', mktime(0, 0, 0, $rpb->bulan, 10))}}</td>
									<td>{{$rpb->tahun}}</td>
									<td>{{$rpb->total_pengeluaran}}</td>
									<td>{{$rpb->total_pemasukan}}</td>
									<td>{{$rpb->saldo_usaha}}
									</td>
									<td><a href="{{ URL::to('/lkm/dashboard-detailreportpendanaanbank/'.$rpb->id_laporan_b)}}"><button>Lihat</button></a></td>
								</tr>
								@endforeach
								</tbody>
								<br/><?php echo $reportBank->render(); ?>
							</table>
							<br/>
					</div>
				</section>
			</section>
		

		@elseif (Auth::user()->admin==1)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />

		@elseif (Auth::user()->admin==0)
			<meta http-equiv="refresh" content="0;URL='{{ url('/logout') }}'" />
		
	@endif

@endsection
