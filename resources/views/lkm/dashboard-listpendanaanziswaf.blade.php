@extends('layouts.dashboard')

@section('content')

	@if (Auth::guest())

		<meta http-equiv="refresh" content="0;URL='{{ url('/login') }}'" />

		@elseif (Auth::user()->admin==2)
			
			<nav>
				<ul>
					<li><a href="#" > Penggalangan Dana</a>
						<ul class="submenu">
						<li><a href="{{ url('/lkm/listcrowd')}}/{{ Auth::user()->id }}">Daftar Penggalangan Dana</a></li>
						<li><a href="{{ url('/lkm/laporancrowd')}}/{{ Auth::user()->id }}">Laporan Penggalangan Dana</a></li>
						</ul>
					</li>
					<li ><a href="#"> Pendanaan Usaha</a>
						<ul class="submenu">
						<li><a href="{{ url('/lkm/dashboard-pendanaanusaha')}}/{{ Auth::user()->id }}">Daftar Pendanaan Bank</a></li>
						<li><a href="{{ url('/dashboard/showReportPendanaanBank')}}">Laporan Pendanaan Bank</a></li>
						</ul>
					</li>
					<li class="section"><a href="#"> Pendanaan Lembaga ZISWAF</a>
					<ul class="submenu">
						<li class="section"><a href="{{ url('/lkm/dashboard-listpendanaanziswaf')}}/{{ Auth::user()->id }}">Daftar Pendanaan Lembaga</a></li>
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
						<h2>Daftar Pendanaan yang diperoleh dari lembaga ziswaf</h2>
					</hgroup>
				</header>
				<div class="content">
					
					<table id="myTable" border="0" >
						<thead>
						<tr>
							<th>Nama Transaksi</th>
							<th>Nama UMKM</th>
							<th>Kategori</th>
							<th>Tanggal Transaksi</th>
							<th>Total Dana</th>
							<th>Action</th>
							<th>Status</th>
						</tr>
						</thead>
						<tbody>
							@foreach($reportpendanaan as $rpdn)
							<tr>
								<td>{{$rpdn->nama_pendanaan}}</td>
								<td>{{$rpdn->nama_pj}}</td>
								<td>{{$rpdn->kategori}}</td>
								<td>{{$rpdn->tgl_pendanaan}}</td>
								<td>{{$rpdn->total_dana}}</td>		
								<td>
									<form action="{{ URL::to('updatestatusdanalkm') }}" method="post">
									{!! csrf_field() !!}

									<input type="hidden" value="{{$rpdn->id_pendanaan_ziswaf}}" name="id_pendanaan_ziswaf">

									  <select name="status">
									    <option value="#">Ubah Status</option>
									    <option value="1">Telah Diterima</option>
									    <option value="0">Belum Diterima</option>
									  </select>

									  <input type="submit" value="Update">

									 </form>

								</td>
								<td>
									<center>
										<?php 
											$statusbelum = "0";
											$statussudah = "1";

											if ($rpdn->status == $statussudah) {
												echo "<font color='green'>Sudah Diterima</font>";
											} else if ($rpdn->status == $statusbelum) {
												echo "<font color='red'>Belum Diterima</font>";
											} 
										?>
									</center>
								</td>
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

